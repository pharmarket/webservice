<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class Sujet_forumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($sujet_forum = \Sujet_forum::with('catagorieForum')->get()){
			return response()->json(['response' => $sujet_forum], 200);
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
				'categorie_id' => 'required|numeric',
				'sujet' => 'required|max:45'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($sujet_forum = \Sujet_forum::create($data)){
				return response()->json(['sujet_forum' => $sujet_forum], 200);
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
	public function show($sujet_forum)
	{
		if($sujet_forum = \Sujet_forum::with('catagorieForum')->find($sujet_forum->id)){
			return response()->json(['response' => $sujet_forum], 200);
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
	public function update($sujet_forum)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'categorie_id' => 'required|numeric',
				'sujet' => 'required|max:45'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($sujet_forum->update($data)){
				return response()->json(['sujet_forum' => $sujet_forum], 200);
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
	public function destroy($sujet_forum)
	{
		if($sujet_forum->delete($sujet_forum)){
			return response()->json(['sujet_forum' => $sujet_forum], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
