<?php

namespace Dashboard\Api;

use BaseController, View, Input;
use Dashboard\Admin\User as Model;
use Bllim\Datatables\Datatables;

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
         $defaults = Model::prepareQuery();

        //Have we passed a where clause?
        if ( $defaults['where'] )
            $records = Model::select($defaults['cols'])->where($defaults['where'][0], $defaults['where'][1]);
        else 
            $records = Model::select($defaults['cols']);

        return Datatables::of($records)->make();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // return View::make('apis.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
        // return View::make('apis.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // return View::make('apis.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
