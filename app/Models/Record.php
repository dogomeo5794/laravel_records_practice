<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        "uuid",
        "last_name",
        "first_name",
        "middle_name",
        "ext_name",
        "date_of_birth",
        "civil_status",
        "address",
        "contact",
        "gender"
    ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
