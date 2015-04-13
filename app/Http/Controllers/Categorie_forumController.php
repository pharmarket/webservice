<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class Categorie_forumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($categorie_forum = \Categorie_forum::get()){
			return response()->json(['response' => $categorie_forum], 200);
		}
		else{
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
				'label' => 'required|max:45',
				'description' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($categorie_forum = \Categorie_forum::create($data)){
				return response()->json(['categorie_forum' => $categorie_forum], 200);
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
	public function show($categorie_forum)
	{
		return response()->json(['response' => $categorie_forum], 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($categorie_forum)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'label' => 'required|max:45',
				'description' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{
	  		if($categorie_forum->update($data)){
				return response()->json(['categorie_forum' => $categorie_forum], 200);
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
	public function destroy($categorie_forum)
	{
		if($categorie_forum->delete($categorie_forum)){
			return response()->json(['categorie_forum' => $categorie_forum], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
