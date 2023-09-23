<?php

namespace Dedecube\LegalConsent\Commands;

use Illuminate\Console\Command;
use function Laravel\Prompts\confirm;

class Install extends Command
{
    protected $signature = 'legal-consent:install';

    protected $description = 'Install the Legal Consent package';

    public function handle()
    {
        if (!$this->isLaravelPromptsInstalled()) {
            $this->error('Please install the laravel/prompts package first.');
            return;
        }

        if (confirm('Do you want to publish the legal consent config file?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-config']);
        }

        if (confirm('Do you want to publish the legal consent migrations?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-migrations']);
        }

        if (confirm('Do you want to publish the legal consent enums?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-enums']);
        }

        if (confirm('Do you want to publish the legal consent nova resources?', true)) {
            $this->call('vendor:publish', ['--tag' => 'legal-consent-nova-resources']);
        }
    }

    private function isLaravelPromptsInstalled(): bool
    {
        $composerLock = json_decode(file_get_contents(base_path('composer.lock')), true);

        $packages = array_column($composerLock['packages'], 'name');

        if (in_array('laravel/prompts', $packages)) {
            return true;
        }

        return false;
    }
}
