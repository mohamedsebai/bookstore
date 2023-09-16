<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    use HasFactory;

    protected $table = 'faq_questions';

    protected $fillable = ['question'];

    public function answers(){
        return $this->hasMany(FaqAnswer::class);
    }


}
