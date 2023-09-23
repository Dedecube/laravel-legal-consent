<?php

namespace Dedecube\LegalConsent\Database\Factories;

use Dedecube\LegalConsent\Models\LegalDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

class LegalDocumentFactory extends Factory
{
    protected $model = LegalDocument::class;

    public function definition()
    {
        return [
            'type' => 'tos',
            'body' => $this->faker->randomHtml(),
            'notes' => $this->faker->randomHtml(),
            'published_at' => null,
        ];
    }
}
