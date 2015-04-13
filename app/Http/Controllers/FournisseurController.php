<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class FournisseurController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($fournisseur = \Fournisseur::get()){
			return response()->json(['response' => $fournisseur], 200);
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
				'siret' => 'required|max:14',
				'nom' => 'required|max:45',
				'adresse' => 'required|max:100',
				'cp' => 'required|numeric',
				'ville' => 'required|max:45',
				'phone' => 'required|numeric',
				'contact' => 'required|max:45',
				'commentaire' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($fournisseur = \Fournisseur::create($data)){
				return response()->json(['fournisseur' => $fournisseur], 200);
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
	public function show($fournisseur)
	{
		return response()->json(['response' => $fournisseur], 200);
	}

	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($fournisseur)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'siret' => 'required|max:14',
				'nom' => 'required|max:45',
				'adresse' => 'required|max:100',
				'cp' => 'required|numeric',
				'ville' => 'required|max:45',
				'phone' => 'required|numeric',
				'contact' => 'required|max:45',
				'commentaire' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($fournisseur->update($data)){
				return response()->json(['fournisseur' => $fournisseur], 200);
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
	public function destroy($fournisseur)
	{
		if($fournisseur->delete($fournisseur)){
			return response()->json(['fournisseur' => $fournisseur], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
