<?php

class SourceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$source = Source::get();
 
	    return Response::json(array(
	        'error' => false,
	        'source' => $source->toArray()),
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
		$source = new Source;
	    $source->src_name = Request::get('src_name');
	    $source->src_description = Request::get('src_description');
	    $source->src_auth_type = Request::get('src_auth_type');
	 	$source->src_status = Request::get('src_status');
	 

	    $url->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'sources' => $sources->toArray()),
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
		$source = Source::where('id', $id)
	            ->take(1)
	            ->get();
	 
	    return Response::json(array(
	        'error' => false,
	        'sources' => $source->toArray()),
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
		$source = Source::where('id', $id)->find($id);
 		
 		if ( Request::get('src_name') )
	    {
	        $source->src_name = Request::get('src_name');
	    }
	 
	    if ( Request::get('src_description') )
	    {
	        $source->src_description = Request::get('src_description');
	    }
	 
	    if ( Request::get('src_auth_type') )
	    {
	        $source->src_auth_type = Request::get('src_auth_type');
	    }
	    if ( Request::get('src_status') )
	    {
	        $source->src_status = Request::get('src_status');
	    }
	 
	    $post->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'message' => 'source updated'),
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
		$source = Source::find($id);
	    $source->delete();
	    return Response::json(array('error' => false, 'message' => 'deleted'), 200);
	}

}