<?php

namespace Dedecube\LegalConsent\Commands;

use Illuminate\Console\Command;
use Dedecube\Composer\Facades\Composer;

use function Laravel\Prompts\confirm;

class Install extends Command
{
    protected $signature = 'legal-consent:install';

    protected $description = 'Install the Legal Consent package';

    public function handle()
    {
        if (confirm('Do you want to publish the legal consent config file?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-config']);
        }

        if (confirm('Do you want to publish the legal consent migrations?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-migrations']);
        }

        if (confirm('Do you want to publish the legal consent enums?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-enums']);
        }

        if (Composer::isPackageInstalled('laravel/nova')) {
            $this->publishNovaResources();
        }
    }

    private function publishNovaResources()
    {
        if (confirm('Do you want to publish the legal consent nova resources?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-nova-resources']);
        }
    }
}
