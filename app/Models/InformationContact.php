<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationContact extends Model
{
    use HasFactory;

    protected $table = 'information_contact';
    protected $fillable = [ 
        'phone',
        'email',
        'technical_support_address',
        'ongoing_support_address',
    ];
}
