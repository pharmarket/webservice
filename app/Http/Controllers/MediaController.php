<?php namespace App\Http\Controllers;

class MediaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($media = \Media::get()){
			return response()->json(['response' => $media, 'status' => 200]);
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

			if($media = \Media::create($data)){
				return response()->json(['media' => $media, 'status' => 200]);
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
	public function show($media)
	{
		return response()->json(['response' => $media, 'status' => 200]);
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
				return response()->json(['media' => $media, 'status' => 200]);
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
	public function destroy($media)
	{
		if($media->delete($media)){
			return response()->json(['media' => $media, 'status' => 200]);
		}
		else{
			return response()->json(['status' => 400]);
		}
	}

}
