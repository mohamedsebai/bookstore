<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqAnswer extends Model
{
    use HasFactory;

    protected $table = 'faq_answers';

    protected $fillable = [
        'answer',
        'product_id',
        'question_id'
    ];


    public function question(){
        return $this->belongsTo(FaqQuestion::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
