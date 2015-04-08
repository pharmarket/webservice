<?php namespace App\Http\Controllers;

class Posologie_sexeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($posologie_sexe = \Posologie_sexe::get()){
			return response()->json(['response' => $posologie_sexe, 'status' => 200]);
		}else{
			return response()->json(['status' => 400]);
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
				'produit_id' => 'required|numeric',
				'sexe' => 'required|max:1|numeric',
				'coeff' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($posologie_sexe = \Posologie_sexe::create($data)){
				return response()->json(['posologie_sexe' => $posologie_sexe, 'status' => 200]);
			}
			else{
				return response()->json(['status' => 400]);
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($posologie_sexe)
	{
		return response()->json(['response' => $posologie_sexe, 'status' => 200]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($posologie_sexe)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'produit_id' => 'required|numeric',
				'sexe' => 'required|max:1|numeric',
				'coeff' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($posologie_sexe->update($data)){
				return response()->json(['posologie_sexe' => $posologie_sexe, 'status' => 200]);
			}
			else{
				return response()->json(['status' => 400]);
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($posologie_sexe)
	{
		if($posologie_sexe->delete($posologie_sexe)){
			return response()->json(['posologie_sexe' => $posologie_sexe, 'status' => 200]);
		}
		else{
			return response()->json(['status' => 400]);
		}
	}

}
