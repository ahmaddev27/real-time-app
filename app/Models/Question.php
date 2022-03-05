<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute(){

        return url("api/question/$this->slug");
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
