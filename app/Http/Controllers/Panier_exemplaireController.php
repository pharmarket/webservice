<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class Panier_exemplaireController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//dd($panier_exemplaire_t = \panier_exemplaire::with('panier_exemplaireType')->find(1));


		if($panier_exemplaire = \Panier_exemplaire::with('panier', 'produit_exemplaire')->get()){
			return response()->json(['response' => $panier_exemplaire], 200);
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

			if($panier_exemplaire = \Panier_exemplaire::create($data)){
				return response()->json(['panier_exemplaire' => $panier_exemplaire], 200);
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
	public function show($panier_exemplaire)
	{

		//dd($panier_exemplaire_t = \panier_exemplaire::with('panier_exemplaireType')->find(1));


		if($panier_exemplaire = \Panier_exemplaire::with('panier', 'produit_exemplaire')->find($panier_exemplaire->id)){
			return response()->json(['response' => $panier_exemplaire], 200);
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
	public function update($panier_exemplaire)
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

			if($panier_exemplaire->update($data)){
				return response()->json(['panier_exemplaire' => $panier_exemplaire], 200);
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
	public function destroy($panier_exemplaire)
	{
		if($panier_exemplaire->delete($panier_exemplaire)){
			return response()->json(['panier_exemplaire' => $panier_exemplaire], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
