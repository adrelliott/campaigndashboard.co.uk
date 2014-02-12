<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->render()->with('contacts', Contact::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return $this->render();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // $contact = Contact::create(Input::all());

        // var_dump($contact);
        // 
        
        $contact = new Contact;

        if ($contact->save())
        {
            return Redirect::route('contacts.edit', array($contact->id))->with('message', 'That has been saved');
        }

        else
        {
            return Redirect::route('contacts.create')->withErrors($contact->errors());
        }


        // 
        // 
        // 

        //Try and store the contact record
        // try
        // {
        //     $id = Crm::make(Input::all());
        // }
    
        // //Catch any exception
        // catch (ValidationException $e)
        // {
        //     return Redirect::create()->withErrors($e->getErrors())->withInput();
        // }

        // //if it is stored successfully, then redirect to edit/{$id} with message
        // return Redirect::edit()->with([
        //     'message' => '[success]'
        // ]);
	}

	/**
	 * Display the specified resource. (Can we be used to show a non-editable record, e.g. if permissions are not adequate to edit)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->render()->with('contact', Contact::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->render()->with('contact', Contact::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$c = new Contact;

        var_dump(Input::all());
        // $c->save();
        // dd($c);

        if ($c->save())
        {
            return Redirect::route('contacts.edit', array($id))->with('message', '[success]');
        } 
       
        else
        {
            return Redirect::route('contacts.edit', array($id))->withErrors($c->errors());
            // var_dump($c);
        }

        //Try and store the contact record
        // try
        // {
        //     $id = Crm::update(Input::all());
        // }
    
        // //Catch any exception
        // catch (ValidationException $e)
        // {
        //     return Redirect::edit()->withErrors($e->getErrors())->withInput();
        // }

        // //if it is stored successfully, then redirect to edit/{$id} with message
        // return Redirect::edit()->with([
        //     'message' => '[success]'
        // ]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Form submists as DELETE to contacts/$id
	}

}