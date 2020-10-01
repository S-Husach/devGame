<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['voter_id','voted_for_id','category_id','vote_value'];
    protected $table = "votes";

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
