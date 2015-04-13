<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, (files = image et video)
**	Verification du file
**	Stockage dans dossier organiser des files (image, video) sur server
**	Verification de l'image et hashage des files afin d'avoir des chemins différent pour chaque files
**	creation du chemin complet vers le fichier et enregistrement du chemin complet en bdd
**
**/

class MediaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($media = \Media::with('produit')->get()){
			return response()->json(['response' => $media], 200);
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

		
		dd($data["nom"]);



		$data = \Input::get('data');
	  	$destinationPath = 'img/';
	  	$fileName = $data['nom'];
		\Input::file('fichier')->move($destinationPath, $fileName);exit();








		$validator = \Validator::make(
			$data,
 			array(
				'produit_id' => 'required|numeric',
				'type' => 'required|max:45',
				'nom' => 'required|max:45',
				'chemin' => 'required|max:45',
				'description' => 'required',
				'default' => 'required|max:1|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($media = \Media::create($data)){
				return response()->json(['media' => $media], 200);
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
	public function show($media)
	{
		if($media = \Media::with('produit')->find($media->id)){
			return response()->json(['response' => $media], 200);
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
	public function update($media)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'produit_id' => 'required|numeric',
				'type' => 'required|max:45',
				'nom' => 'required|max:45|unique:media',
				'chemin' => 'required|max:45',
				'description' => 'required',
				'default' => 'required|max:1|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($media->update($data)){
				return response()->json(['media' => $media], 200);
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
	public function destroy($media)
	{
		if($media->delete($media)){
			return response()->json(['media' => $media], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
