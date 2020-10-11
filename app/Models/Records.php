<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Records extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['bc', 'check_date', 'age', 'weight', 'body_length', 'head_circumference', 'tindak_balas', 'jaundice', 'vaccine_id'];
}
