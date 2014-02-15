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
            return Redirect::route('crm.contacts.edit', array($contact->id))
                ->with('message', '[SAVE_SUCCESS]');
        }

        else
        {
            return Redirect::back()
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
        $contact = Contact::findOrFail($id);
        return $this->render()->withContact($contact);
        // return $this->render()->with(compact('contact'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contact = Contact::findOrFail($id);
        return $this->render()->withContact($contact);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contact = Contact::findOrFail($id);

        if ($contact->save())
        {
            return Redirect::route('crm.contacts.edit', array($id))
                ->with('message', '[SAVE_SUCCESS]');
        } 
       
        else
        {
            return Redirect::back()
                ->with('message', '[SAVE_VAL_FAIL]')
                ->withErrors($contact->errors());
        }
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