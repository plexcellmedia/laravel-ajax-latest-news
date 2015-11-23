<?php

class ExampleController extends Controller {
	
	protected function home() {
		
		// Load news on page load
		$news = DB::table('news')->orderBy('ts', 'desc')->paginate(5);
		
		// If ajax request, return news in JSON array
		if (Request::ajax()) {
			return Response::json(View::make('news', array(
				'news' => $news
			))->render());
		}
		
		return View::make('home', array(
			'news' => $news
		));
	}
	
}
