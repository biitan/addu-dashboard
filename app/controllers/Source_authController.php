<?php

class Source_authController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$source_auth = Source_auth::get();
 
	    return Response::json(array(
	        'errors' => false,
	        'source_auth' => $source_auth->toArray()),
	        200
	    );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$source_auth = new Source_auth;
	    $source_auth->user_id = Request::get('user_id');
	    $source_auth->source_id = Request::get('source_id');
	    $source_auth->auth_key = Request::get('auth_key');
	    $source_auth->save();
	    return Response::json(array(
	        'error' => false,
	        'source_auth' => $source_auth->toArray()),
	        200
	    );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$source_auth = Source_auth::where('id', $id)
	            ->take(1)
	            ->get();
	 
	    return Response::json(array(
	        'error' => false,
	        'source_auth' => $source_auth->toArray()),
	        200
	    );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$source_auth = Source_auth::where('id', $id)->find($id);
 		
 		if ( Request::get('user_id') )
	    {
	        $source_auth->user_id = Request::get('user_id');
	    }
	 
	    if ( Request::get('source_id') )
	    {
	        $source_auth->source_id = Request::get('source_id');
	    }
	 
	    if ( Request::get('auth_key') )
	    {
	        $source_auth->auth_key = Request::get('auth_key');
	    }
	 
	    $post->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'message' => 'source_auth updated'),
	        200
	    );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$source_auth = Source_auth::find($id);
	    $source_auth->delete();
	    return Response::json(array('error' => false, 'message' => 'deleted'), 200);
	}

}