<?php

class Post_visibilityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$post_visibility = Post_visibility::get();
 
	    return Response::json(array(
	        'error' => false,
	        'post_visibility' => $post_visibility->toArray()),
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
		$post_visibility = new Post_visibility;
	    $post_visibility->post_id = Request::get('post_id');
	    $post_visibility->user_id = Request::get('user_id');
	    $post_visibility->pv_status = Request::get('pv_status');
	 
	    $url->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'post_visibility' => $post_visibility->toArray()),
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
		$post_visibility = Post::where('id', $id)
	            ->take(1)
	            ->get();
	 
	    return Response::json(array(
	        'error' => false,
	        'post_visibility' => $post_visibility->toArray()),
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
		$post_visibility = Post_visibility::where('id', $id)->find($id);
 		
 		if ( Request::get('post_src_id') )
	    {
	        $post_visibility->post_src_id = Request::get('post_src_id');
	    }
	 
	    if ( Request::get('user_id') )
	    {
	        $post_visibility->user_id = Request::get('user_id');
	    }
	 
	    if ( Request::get('pv_status') )
	    {
	        $post_visibility->pv_status = Request::get('pv_status');
	    }
	 
	    $post->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'message' => 'post visibility updated'),
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
		$post_visibility = Post_visibility::find($id);
	    $post_visibility->delete();
	    return Response::json(array('error' => false, 'message' => 'deleted'), 200);
	}

}