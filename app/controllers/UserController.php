<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::get();
 
	    return Response::json(array(
	        'error' => false,
	        'user' => $user->toArray()),
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
		$user = new User;
	    $user->username = Request::get('username');
	    $user->password = Request::get('password');
	    $user->ldap_id = Request::get('ldap_id');
	 
	    $url->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'users' => $users->toArray()),
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
		$user = User::where('id', $id)
	            ->take(1)
	            ->get();
	 
	    return Response::json(array(
	        'error' => false,
	        'users' => $user->toArray()),
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
		$user = Source_auth::where('id', $id)->find($id);
 		
 		if ( Request::get('username') )
	    {
	        $user->username = Request::get('username');
	    }
	 
	    if ( Request::get('password') )
	    {
	        $user->password = Request::get('password');
	    }
	 
	    if ( Request::get('ldap_id') )
	    {
	        $user->ldap_id = Request::get('ldap_id');
	    }
	 
	    $post->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'message' => 'user updated'),
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
		$user = User::find($id);
	    $user->delete();
	    return Response::json(array('error' => false, 'message' => 'deleted'), 200);
	}

}