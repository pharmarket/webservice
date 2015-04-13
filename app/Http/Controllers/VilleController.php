<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class VilleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//dd($ville_t = \ville::with('villeType')->find(1));


		if($ville = \Ville::with('pays')->get()){
			return response()->json(['response' => $ville], 200);
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
				'pays_id' => 'required|numeric',
				'nom' => 'required|max:45',
				'cp' => 'required|numeric',
				'adresse' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($ville = \Ville::create($data)){
				return response()->json(['ville' => $ville], 200);
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
	public function show($ville)
	{

		//dd($ville_t = \ville::with('villeType')->find(1));


		if($ville = \Ville::with('pays')->find($ville->id)){
			return response()->json(['response' => $ville], 200);
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
	public function update($ville)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'pays_id' => 'required|numeric',
				'nom' => 'required|max:45',
				'cp' => 'required|numeric',
				'adresse' => 'required'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($ville->update($data)){
				return response()->json(['ville' => $ville], 200);
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
	public function destroy($ville)
	{
		if($ville->delete($ville)){
			return response()->json(['ville' => $ville], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
