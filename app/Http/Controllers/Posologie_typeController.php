<?php namespace App\Http\Controllers;

class posologie_typeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($posologie_type = \Posologie_type::get()){
			return response()->json(['response' => $posologie_type, 'status' => 200]);
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
				'label' => 'required|max:45'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($posologie_type = \Posologie_type::create($data)){
				return response()->json(['posologie_type' => $posologie_type, 'status' => 200]);
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
	public function show($posologie_type)
	{
		return response()->json(['response' => $posologie_type, 'status' => 200]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($posologie_type)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'label' => 'required|max:45'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($posologie_type->update($data)){
				return response()->json(['posologie_type' => $posologie_type, 'status' => 200]);
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
	public function destroy($posologie_type)
	{
		if($posologie_type->delete($posologie_type)){
			return response()->json(['posologie_type' => $posologie_type, 'status' => 200]);
		}
		else{
			return response()->json(['status' => 400]);
		}
	}

}
