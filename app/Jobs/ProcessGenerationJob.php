<?php

namespace App\Jobs;

use App\Contracts\GenerationCreationServiceInterface;
use App\Contracts\GenerationRetrievalServiceInterface;
use App\Exceptions\GenerationNotFoundException;
use App\Models\Generation;
use App\Pipes\ProcessGenerationJob\CleanupLocal;
use App\Pipes\ProcessGenerationJob\DownloadLocal;
use App\Pipes\ProcessGenerationJob\RequestGeneration;
use App\Pipes\ProcessGenerationJob\ThumbnailGeneration;
use App\Pipes\ProcessGenerationJob\UploadToS3;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Pipeline\Pipeline;

class ProcessGenerationJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 2;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected readonly string $userId,
        protected readonly string $generationID,
    ) {}

    /**
     * Execute the job.
     *
     * @throws GenerationNotFoundException
     */
    public function handle(
        GenerationRetrievalServiceInterface $generationRetrievalService,
        GenerationCreationServiceInterface $generationCreationService,
        Pipeline $pipeline,
    ): void {
        $generationCreationService->setGenerationAsProcessing($this->generationID);

        $generation = $generationRetrievalService->getGeneration($this->userId, $this->generationID);

        $context = [
            'generation' => $generation,
            'user' => $this->userId,
        ];

        $pipeline
            ->send($context)
            ->through([
                RequestGeneration::class,
                DownloadLocal::class,
                ThumbnailGeneration::class,
                UploadToS3::class,
                CleanupLocal::class,
            ])
            ->then(function ($context) use ($generationCreationService) {
                $contextGenerationId = $context['generation']['id'];
                $contextFilePath = $context['result']['file_path'];
                $contextThumbnailPath = $context['result']['thumbnail_file_path'];

                $generationCreationService->setGenerationAsCompleted(
                    $contextGenerationId,
                    $contextFilePath,
                    $contextThumbnailPath
                );
            });
    }

    public function failed(GenerationCreationServiceInterface $generationCreationService): void
    {
        $generationCreationService->setGenerationAsFailed($this->generationID);
    }
}
