<?php

namespace Dedecube\LegalConsent\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Dedecube\LegalConsent\HasLegalConsent;

class User extends Authenticatable
{
    use HasFactory;
    use HasLegalConsent;
}
