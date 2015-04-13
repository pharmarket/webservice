<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class Message_forumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//dd($message_forum_t = \message_forum::with('message_forumType')->find(1));


		if($message_forum = \Message_forum::with('sujet', 'user')->get()){
			return response()->json(['response' => $message_forum], 200);
		}else{
			return response()->json('', 400);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'sujet_id' => 'required|numeric',
				'user_id' => 'required|numeric',
				'message' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($message_forum = \Message_forum::create($data)){
				return response()->json(['message_forum' => $message_forum], 200);
			}
			else{
				return response()->json('', 400);
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($message_forum)
	{

		//dd($message_forum_t = \message_forum::with('message_forumType')->find(1));


		if($message_forum = \Message_forum::with('sujet', 'user')->find($message_forum->id)){
			return response()->json(['response' => $message_forum], 200);
		}else{
			return response()->json('', 400);
		}
	}

	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($message_forum)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'sujet_id' => 'required|numeric',
				'user_id' => 'required|numeric',
				'message' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($message_forum->update($data)){
				return response()->json(['message_forum' => $message_forum], 200);
			}
			else{
				return response()->json('', 400);
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($message_forum)
	{
		if($message_forum->delete($message_forum)){
			return response()->json(['message_forum' => $message_forum], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
