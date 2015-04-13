<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class PosologieController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if($posologie = \Posologie::with('produit', 'posologie_type')->get()){
			return response()->json(['response' => $posologie], 200);
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
				'produit_id' => 'required|numeric',
				'type_id' => 'required|numeric',
				'min' => 'required|numeric',
				'max' => 'required|numeric',
				'coeff' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($posologie = \Posologie::create($data)){
				return response()->json(['posologie' => $posologie], 200);
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
	public function show($posologie)
	{
		if($posologie = \Posologie::with('produit', 'posologie_type')->find($posologie->id)){
			return response()->json(['response' => $posologie], 200);
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
	public function update($posologie)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'produit_id' => 'required|numeric',
				'type_id' => 'required|numeric',
				'min' => 'required|numeric',
				'max' => 'required|numeric',
				'coeff' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($posologie->update($data)){
				return response()->json(['posologie' => $posologie], 200);
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
	public function destroy($posologie)
	{
		if($posologie->delete($posologie)){
			return response()->json(['posologie' => $posologie], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
