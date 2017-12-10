<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

use App\Lesson;

use App\Http\Resources\TagCollection;


class TagsController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($lessonId = null)
    {

        $tags = $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();

        return new TagCollection($tags);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        
        //

    }

}
