<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class NewletterController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($newletter = \Newletter::get()){
			return response()->json(['response' => $newletter], 200);
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
				'mail' => 'required|email',
				'choix' => 'required|boolean'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($newletter = \Newletter::create($data)){
				return response()->json(['Newsletter' => $newletter], 200);
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
	public function show($newletter)
	{
		return response()->json(['response' => $newletter], 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($newletter)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'mail' => 'required|email',
				'choix' => 'required|boolean'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($newletter->update($data)){
				return response()->json(['Newletter' => $newletter], 200);
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
	public function destroy($newletter)
	{
		if($newletter->delete($newletter)){
			return response()->json(['Newletter' => $newletter], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}
