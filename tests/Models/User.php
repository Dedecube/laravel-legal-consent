<?php

namespace Dedecube\LegalConsent\Tests\Models;

use Dedecube\LegalConsent\HasLegalConsent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use HasLegalConsent;
}
