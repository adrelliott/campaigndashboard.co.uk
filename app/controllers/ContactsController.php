<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->render();
            // ->with('contacts', Contact::all());
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
        $contact = new Contact;

        if ($contact->save())
        {
            return Redirect::route('contacts.edit', array($contact->id))
                ->with('message', '[SAVE_SUCCESS]');
        }

        else
        {
            return Redirect::route('contacts.create')
                ->with('message', '[SAVE_VAL_FAIL]')
                ->withErrors($contact->errors());
        }
	}

	/**
	 * Display the specified resource. (Can we be used to show a non-editable record, e.g. if permissions are not adequate to edit)
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->render();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->render()->with('id', $id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contact = Contact::find($id);

        if ($contact->save())
        {
            return Redirect::route('contacts.edit', array($id))
                ->with('message', '[SAVE_SUCCESS]');
        } 
       
        else
        {
            return Redirect::route('contacts.edit', array($id))
                ->with('message', '[SAVE_VAL_FAIL]')
                ->withErrors($contact->errors());
                // ->with_errors($contact->errors());
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