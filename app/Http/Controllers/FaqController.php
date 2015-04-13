<?php namespace App\Http\Controllers;

/***
**
**	En cours actuellement, 
** 	Verif des id dans le store et update
**
**/

class FaqController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($faq = \Faq::get()){
			return response()->json(['response' => $faq], 200);
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
				'question' => 'required',
				'answer' => 'required',
				'order' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($faq = \Faq::create($data)){
				return response()->json(['Faq' => $faq], 200);
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
	public function show($faq)
	{
		return response()->json(['response' => $faq], 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($faq)
	{
		$data = \Input::get('data');

		$validator = \Validator::make(
			$data,
 			array(
				'question' => 'required',
				'answer' => 'required',
				'order' => 'required|numeric'
			)
  		);

	  	if($validator->fails()){
	  		return $validator->errors();
	  	}
	  	else{

			if($faq->update($data)){
				return response()->json(['Faq' => $faq], 200);
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
	public function destroy($faq)
	{
		if($faq->delete($faq)){
			return response()->json(['Faq' => $faq], 200);
		}
		else{
			return response()->json('', 400);
		}
	}

}