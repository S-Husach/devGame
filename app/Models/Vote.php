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

    public function voter()
    {
        return $this->belongsTo(User::class, 'voter_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'voted_for_id', 'id');
    }
}
