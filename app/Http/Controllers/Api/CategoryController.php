<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{

    public function __construct() {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    use ApiResponseTrait;

    public function index(){

        return $this->apiRespose(CategoryResource::collection(Category::latest()->get()),'ok',201);
    }




    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255',
            'slug'=>'required',

        ]);

        if ($validator->fails()){
            return $this->apiRespose(null,$validator->errors(),404);
        }

        $category= Category::create($request->all());
        if ($category) {
            return $this->apiRespose(new CategoryResource($category),'Data Created',201);
        }
        return $this->apiRespose(null,'Data Not saved',404);

    }



    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            return $this->apiRespose(new CategoryResource($category),'ok',200);
        }
        return $this->apiRespose(null,'Not Found Data',401);
    }




    public function update(Request $request,$slug)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255',
            'slug'=>'required',

        ]);


        if ($validator->fails()){
            return $this->apiRespose(null,$validator->errors(),404);

        }else{
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $category->update($request->all());

                return $this->apiRespose(new CategoryResource($category),'Data Updated',200);
            }
            return $this->apiRespose(null,'Not Found Data',401);

        }

    }



    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $category->delete();
            return $this->apiRespose(null,'Data Deleted',200);
        }else{
            return $this->apiRespose(null,'Not Found Data',404);
        }
    }
}
