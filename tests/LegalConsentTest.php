<?php

namespace Dedecube\LegalConsent\Tests;

use Carbon\Carbon;
use Dedecube\LegalConsent\Models\LegalConsent;
use Dedecube\LegalConsent\Models\LegalDocument;
use Dedecube\LegalConsent\Tests\Models\User;
use Illuminate\Support\Arr;

class LegalConsentTest extends TestCase
{
    /** @test */
    public function can_accept_document()
    {
        $type = Arr::first(config('legal-consent.allowed_document_types'));

        $user = User::factory()->create();

        $doc = LegalDocument::factory()->create([
            'type' => $type,
            'published_at' => Carbon::now()->subDays(2),
        ]);

        $route = $this->getRouteByPartialName(
            'documents.consent',
            $doc->getKey()
        );

        $table = (new LegalConsent())->getTable();

        $this
            ->actingAs($user, 'api')
            ->postJson($route)
            ->assertStatus(204);

        $this->assertDatabaseCount($table, 1);
    }

    /** @test */
    public function can_not_accept_document_if_user_is_not_authenticated()
    {
        $type = Arr::first(config('legal-consent.allowed_document_types'));

        $doc = LegalDocument::factory()->create([
            'type' => $type,
            'published_at' => Carbon::now()->subDays(2),
        ]);

        $route = $this->getRouteByPartialName(
            'documents.consent',
            $doc->getKey()
        );

        $table = (new LegalConsent())->getTable();

        $this
            ->postJson($route)
            ->assertStatus(401);

        $this->assertDatabaseCount($table, 0);
    }
}
