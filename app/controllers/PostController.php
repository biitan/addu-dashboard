<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::get();
 
	    return Response::json(array(
	        'error' => false,
	        'posts' => $posts->toArray()),
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
		$post = new Post;
	    $post->post_src_id = Request::get('post_src_id');
	    $post->post_url = Request::get('post_url');
	    $post->post_status = Request::get('post_status');
	 
	    $post->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'posts' => $post->toArray()),
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
		$post = Post::where('id', $id)
	            ->take(1)
	            ->get();
	 
	    return Response::json(array(
	        'error' => false,
	        'posts' => $post->toArray()),
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
		$post = Post::where('id', $id)->find($id);
 		
 		if ( Request::get('post_src_id') )
	    {
	        $post->post_src_id = Request::get('post_src_id');
	    }
	 
	    if ( Request::get('post_url') )
	    {
	        $post->post_url = Request::get('post_url');
	    }
	 
	    if ( Request::get('post_status') )
	    {
	        $post->post_status = Request::get('post_status');
	    }
	 
	    $post->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'message' => 'post updated'),
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
		$post = Post::find($id);
	    $post->delete();
	    return Response::json(array('error' => false, 'message' => 'deleted'), 200);
	}

}