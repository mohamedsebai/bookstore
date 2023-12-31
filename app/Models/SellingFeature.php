<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellingFeature extends Model
{
    use HasFactory;

    protected $table = 'selling_features';

    protected $fillable = ['title', 'descreption'];
}
