<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller{

    use ApiResponseTrait;

    public function index(){

        return $this->apiRespose(QuestionResource::collection(Question::latest()->get()),'ok',201);
    }


    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|max:255',
            'body'=>'required',
            'slug'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
        ]);

        if ($validator->fails()){
            return $this->apiRespose(null,$validator->errors(),404);
        }

        $question= Question::create($request->all());
        if ($question) {
            return $this->apiRespose(new QuestionResource($question),'Data Created',201);
        }
        return $this->apiRespose(null,'Data Not saved',404);

    }


    public function show($slug)
    {
        $question = Question::where('slug', $slug)->first();
        if ($question) {
            return $this->apiRespose(new QuestionResource($question),'ok',200);
        }
        return $this->apiRespose(null,'Not Found Data',401);
    }


    public function update(Request $request,$slug)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|max:255',
            'body'=>'required',
            'slug'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
        ]);


        if ($validator->fails()){
            return $this->apiRespose(null,$validator->errors(),404);

        }else{
            $question = Question::where('slug', $slug)->first();
            if ($question) {
                $question->update($request->all());

                return $this->apiRespose(new QuestionResource($question),'Data Updated',200);
            }
            return $this->apiRespose(null,'Not Found Data',401);

        }

    }


    public function destroy($slug)
    {
        $question = Question::where('slug', $slug)->first();

        if ($question) {
            $question->delete();
            return $this->apiRespose(null, 'Data Deleted', 200);
        }

        return $this->apiRespose(null,'Not Found Data',404);
    }
}
