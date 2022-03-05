<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplayResource extends JsonResource
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
             'question'=>$this->question->body,
             'replay'=>$this->body,
             'user'=>$this->user->name,
             'created_at'=>$this->created_at->diffForHumans(),
        ];
    }
}
