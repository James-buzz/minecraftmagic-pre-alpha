<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $art_type
 * @property string $art_style
 * @property array<mixed> $metadata
 */
class GenerateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'art_type' => 'required|string',
            'art_style' => 'required|string',
            'metadata' => 'sometimes|array',
        ];
    }
}
