<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Vaccines extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['bc', 'BCG', 'Hepatitis_B(dos1)', 'Hepatitis_B(dos2)', 'DTaP/DT(dos1)', 'Hib(dos1)', 'IPV(dos1)', 'DTaP/DT(dos2)', 'Hib(dos2)', 'IPV(dos2)', 'DTaP/DT(dos3)', 'Hib(dos3)', 'IPV(dos3)', 'Hepatitis_B(dos3)', 'Measles(Sabah)', 'JE(dos1)_Sarawak', 'JE(dos1)_Sarawak', '	MMR', 'DTaP/DT(booster)', 'IPV(booster)', '	Hib(booster)', 'JE(dos3)_Sarawak'];
}
