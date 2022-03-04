<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
             'id'=>$this->id,
             'title'=>$this->title,
             'slug'=>$this->slug,
             'body'=>$this->body,
             'path'=>$this->path,
             'user'=>$this->user->name,
             'category'=>$this->category->name,
             'created_at'=>$this->created_at->diffForHumans(),
        ];
    }
}
