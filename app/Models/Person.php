<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string cpf
 * @property Carbon birthdate
 * @property string email
 * @property string phone
 * @property string location
 * @property string city
 * @property string state
 */
class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'birthdate',
        'email',
        'phone',
        'location',
        'city',
        'state'
    ];
}
