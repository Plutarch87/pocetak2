<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ResultRequest;
use App\Result;
use App\Round;
use App\User;
use Illuminate\Http\Request;

class AdminResultController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param ResultRequest $request
     * @return Response
     */
	public function store(ResultRequest $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

    /**
     * Update the specified resource in storage.
     *
     * @param ResultRequest $request
     * @param  int $id
     * @param Result $result
     * @return Response
     * @internal param $id2
     * @internal param $id3
     */
	public function update(ResultRequest $request, $id, $id2, $id3)
	{
	    $event = Event::find($id);
        $result = Result::find($id3);
        $result->update($request->except('_method', '_token'));

        return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
