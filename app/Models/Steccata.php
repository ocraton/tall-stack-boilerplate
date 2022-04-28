<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steccata extends Model
{
    use HasFactory;

    protected $table = 'steccate';

    protected $fillable = [
        'data', 'altezza', 'litri', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
