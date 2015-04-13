<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class DeviseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($devise = \Devise::get()){
			return response()->json(['response' => $devise], 200);
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
				'nom' => 'required|max:45',
				'symbole' => 'required|max:5|unique:devise',
				'taux' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

	  		if($devise = \Devise::create($data)){
				return response()->json(['devise' => $devise], 200);
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
	public function show($devise)
	{
		return response()->json(['response' => $devise], 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($devise)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'nom' => 'required|max:45',
				'symbole' => 'required|max:5|unique:devise',
				'taux' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{
			if($devise->update($data)){
				return response()->json(['devise' => $devise], 200);
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
	public function destroy($devise)
	{
		if($devise->delete($devise)){
			return response()->json(['devise' => $devise], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
