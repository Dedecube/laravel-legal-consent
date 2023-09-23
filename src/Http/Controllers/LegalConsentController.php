<?php

namespace Dedecube\LegalConsent\Http\Controllers;

use Dedecube\LegalConsent\Models\LegalDocument;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LegalConsentController extends Controller
{
    public function __invoke(Request $request, LegalDocument $document)
    {
        $request
            ->user()
            ->acceptLegalDocument($document);

        return response()->noContent();
    }
}
