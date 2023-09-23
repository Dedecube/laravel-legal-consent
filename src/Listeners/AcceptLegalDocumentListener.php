<?php

namespace Dedecube\LegalConsent\Listeners;

class AcceptLegalDocumentListener
{
    public function handle($event): void
    {
        $user = optional($event)->user;

        optional($user)
            ->acceptDefaultLegalDocumentsFromRequest();
    }
}
