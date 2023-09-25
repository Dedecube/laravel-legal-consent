<?php

namespace Dedecube\LegalConsent\Http\Controllers;

use Dedecube\LegalConsent\Http\Resources\LegalDocumentResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LegalDocumentController extends Controller
{
    public function __invoke(Request $request, string $type)
    {
        $finderClass = config('legal-consent.legal_document_finder');
        $document = app($finderClass)->findForType($type, true);

        $resourceClass = config('legal-consent.legal_document_resource');

        return new $resourceClass($document);
    }
}
