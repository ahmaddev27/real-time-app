<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplayResource;
use App\Models\Question;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    use ApiResponseTrait;


    public function index($question)
    {
        $question=Question::where('slug',$question)->first();
        if ($question) {
            $questionReplies=$question->replies;

            if ($questionReplies!=[]){
                return $this->apiRespose(ReplayResource::collection($questionReplies),'ok',201);
            }
            return $this->apiRespose(null,'Not Found Replies ',401);
        }

        return $this->apiRespose(null,'Not Found Question ',401);

    }


    public function store($question,Request $request)
    {
        $question=Question::where('slug',$question)->first();
        if ($question){

            $validator=Validator::make($request->all(),[
                'body'=>'required',
                'user_id'=>'required',
            ]);


            if ($validator->fails()){
                return $this->apiRespose(null,$validator->errors(),404);
            }

            $reply=Reply::create([
                'body'=>$request->body,
                'user_id'=>$request->user_id,
                'question_id'=>$question->id
            ]);

            if ($reply) {
                return $this->apiRespose(new ReplayResource($reply),'Data Created',201);
            }
            return $this->apiRespose(null,'Data Not saved',404);
        }
        return $this->apiRespose(null,'Not Found Question ',401);
    }


    public function show($question, $reply)
    {
        $question=Question::where('slug',$question)->first();
        $reply=Reply::find($reply);

        if ($reply && $question) {
            if ($reply->question_id != $question->id){
                return $this->apiRespose(null,'Wrong given Data',200);
            }
            return $this->apiRespose(new ReplayResource($reply), 'ok', 200);
        }
        return $this->apiRespose(null,'Not Found Data ',401);
        }


    public function update($question,$reply,Request $request){

        $question=Question::where('slug',$question)->first();
        $reply=Reply::find($reply);

        if ($question && $reply){
            $validator=Validator::make($request->all(),[
                'body'=>'required',
                'user_id'=>'required',
            ]);

            if ($validator->fails()){
                return $this->apiRespose(null,$validator->errors(),404);
            }

            if ($reply->question_id != $question->id){
                $reply->update([
                    'body'=>$request->body,
                    'user_id'=>$request->user_id,
                    'question_id'=>$question->id
                ]);
                return $this->apiRespose(new ReplayResource($reply),'Data Updated',201);
            }
            return $this->apiRespose(null,'wrong given data',404);
        }
        return $this->apiRespose(null,'Not Found data ',401);

    }

    public function destroy($question,$reply){
        $reply=Reply::find($reply);
        $question=Question::where('slug',$question)->first();

        if ($reply && $question) {
            if ($reply->question_id==$question->id){
                $reply->delete();
                return $this->apiRespose(null,'Data Deleted',200);
            }
            return $this->apiRespose(null,'Wrong given data',404);
        }
        return $this->apiRespose(null,'Not Found Data',404);
    }


}
