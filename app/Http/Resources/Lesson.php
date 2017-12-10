<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Lesson extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*
            Here you can transform column names and/or remove columns
            you don't want to be send via the JSON response

            Ovo sam uklonio:
            
            'id'=> $this->id,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at
        */
        
        return [

            'title'=> $this->title,
            'body'=> $this->body,
            'active'=> (boolean) $this->some_bool

        ];

    }
}
