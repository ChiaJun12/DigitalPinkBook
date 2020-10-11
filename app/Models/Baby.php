<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Baby extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['bc', 'name', 'birth_date', 'guardian_name', 'guardian2_name', 'address', 'gender', 'ethnic', 'phone_no'];
}
