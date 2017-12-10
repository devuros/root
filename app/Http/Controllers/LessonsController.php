<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Lesson as LessonResource;

use App\Http\Resources\LessonCollection;

use App\Lesson;


class LessonsController extends ApiController
{

	function __construct()
	{

		// $this->middleware('auth.basic')->only('store');

	}
    
	public function index()
	{

		// Ovako je bilo pre paginacije...
		// $lessons = Lesson::all();

		$lessons = Lesson::paginate();

		return new LessonCollection($lessons);

	}

	public function show($id)
	{

		$lesson = Lesson::find($id);

		if(!$lesson)
		{

			return $this->respondNotFound('Lesson does not exist');

		}

		return new LessonResource($lesson);

	}

	public function store(Request $request)
	{

		if(!$request->has('title') or !$request->has('body'))
		{

			return $this->setStatusCode(422)->respondWithError('Parameters failed validation for a lesson');
			
		}

		$title = $request->input('title');
		$body = $request->input('body');
		$some_bool = true;

		$lesson = new Lesson;
		
		$lesson->title = $title;
		$lesson->body = $body;
		$lesson->some_bool = $some_bool;

		$lesson->save();

		return $this->respondCreated('Lesson successfully created');

	}


}
