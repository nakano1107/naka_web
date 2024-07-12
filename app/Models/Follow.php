<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use HasFactory;
    use SoftDeletes;
    
        //フォローしているユーザー
    public function following()
    {
        return $this->belongsToMany(User::class);
    }

    //フォローされているユーザー
    public function followed()
    {
        return $this->belongsToMany(User::class);
    }
    
    //ログインユーザーは、対象ユーザーをフォローしているか？
    public function isFollow()
    {
        $id = $this->id;
        $isFollow = (boolean) Auth::user()->where('follow_id',$id)->first();

    return $isFollow;
    }
    
    protected $fillable = [
    'follow_id',
    'followee_id',
    ];
}
