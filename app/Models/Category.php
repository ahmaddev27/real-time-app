<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute(){

        return url("api/category/$this->slug");
    }

}
