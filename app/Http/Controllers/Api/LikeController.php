<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplayResource;
use App\Models\Reply;

class LikeController extends Controller{

    use ApiResponseTrait;

    public function __construct() {
        $this->middleware('jwt');
    }


    public function like($reply)
    {
        $reply= Reply::find($reply);
        if ($reply) {
            $reply->likes()->create(['user_id'=>auth()->id()]);
            return $this->apiRespose(new ReplayResource($reply),'Reply Liked',201);

        }
        return $this->apiRespose(null,'Data Not saved',404);

    }

    public function unlike($reply)
    {
        $reply=Reply::find($reply);

        if ($reply) {
            $reply->likes()->where('user_id',auth()->id())->first()->delete();
            return $this->apiRespose(new ReplayResource($reply),'Reply UnLiked',201);
        }

        return $this->apiRespose(null,'Data Not saved',404);

    }
}
