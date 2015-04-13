<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class PanierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($panier = \Panier::get()){
			return response()->json(['response' => $panier], 200);
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
				'token' => 'required|max:45'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

	  		if($panier = \Panier::create($data)){
				return response()->json(['panier' => $panier], 200);
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
	public function show($panier)
	{
		return response()->json(['response' => $panier], 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($panier)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'token' => 'required|max:45'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{
			if($panier->update($data)){
				return response()->json(['panier' => $panier], 200);
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
	public function destroy($panier)
	{
		if($panier->delete($panier)){
			return response()->json(['panier' => $panier], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
