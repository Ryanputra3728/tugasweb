<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = "members";

    protected $filltable = ["user_id", "member_code", "email", "phone", "address", "photo", "no_ktp", "photo_identitas", "profil", "status"];
}
