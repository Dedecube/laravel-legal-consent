<?php

namespace Dedecube\LegalConsent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LegalDocumentController extends Controller
{
    public function __invoke(Request $request, string $type)
    {
        $finderClass = config('legal-consent.legal_document_finder');
        $document = app($finderClass)->findForType($type, true);

        /** @var class-string */
        $resourceClass = config('legal-consent.legal_document_resource');

        /** @var \Illuminate\Http\Resources\Json\JsonResource */
        $resource = new $resourceClass($document);

        return $resource;
    }
}
