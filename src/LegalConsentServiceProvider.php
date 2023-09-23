<?php

namespace Dedecube\LegalConsent;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LegalConsentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-legal-consent')
            ->hasConfigFile()
            ->hasRoute('routes')
            ->hasMigration('create_legal_consent_tables')
            ->hasCommand(Commands\Install::class);
    }

    public function registeringPackage()
    {
        $this->publishes([
            __DIR__.'/../stubs/Enums/LegalDocumentType.php.stub' => app_path('Enums/LegalDocumentType.php'),
        ], 'legal-consent-enums');

        $this->publishes([
            __DIR__.'/../stubs/Nova/Resources/LegalDocument.php.stub' => app_path('Nova/LegalDocument.php'),
        ], 'legal-consent-nova-resources');
    }
}
