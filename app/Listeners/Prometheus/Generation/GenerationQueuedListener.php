<?php

namespace App\Listeners\Prometheus\Generation;

use App\Events\Generation\GenerationStarted;
use App\Facades\Prometheus;

class GenerationQueuedListener
{
    /**
     * Handle the event.
     */
    public function handle(GenerationStarted $event): void
    {
        $generation = $event->generation;
        $artStyle = $generation->style->name;
        $artType = $generation->style->type->name;

        // Total
        $totalCounter = Prometheus::getOrRegisterCounter(
            'app',
            'generation_queued_total',
            'Number of generations queued total',
            ['art_type', 'art_style']
        );
        $totalCounter->inc([
            'art_type' => $artType,
            'art_style' => $artStyle,
        ]);
    }
}
