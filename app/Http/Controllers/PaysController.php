<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class PaysController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//dd($pays_t = \pays::with('paysType')->find(1));


		if($pays = \Pays::with('devise')->get()){
			return response()->json(['response' => $pays], 200);
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
				'devise_id' => 'required|numeric',
				'nom' => 'required|max:45|unique:pays'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($pays = \Pays::create($data)){
				return response()->json(['pays' => $pays], 200);
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
	public function show($pays)
	{

		//dd($pays_t = \pays::with('paysType')->find(1));


		if($pays = \Pays::with('devise')->find($pays->id)){
			return response()->json(['response' => $pays], 200);
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
	public function update($pays)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'devise_id' => 'required|numeric',
				'nom' => 'required|max:45|unique:pays'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($pays->update($data)){
				return response()->json(['pays' => $pays], 200);
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
	public function destroy($pays)
	{
		if($pays->delete($pays)){
			return response()->json(['pays' => $pays], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
