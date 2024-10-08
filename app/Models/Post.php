<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count=10)
    {
        return $this->orderBy('updated_at','DESC')->paginate($limit_count);
    }
    
    public function search(string $keyword, int $limit_count=5)
    {
        return $this->where('title', 'LIKE', "%{$keyword}%")->orWhere('body', 'LIKE', "%{$keyword}%")->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);  
    }
    
    protected $fillable = [
    'user_id',
    'title',
    'body',
    ];
}

