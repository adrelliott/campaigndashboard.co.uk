<?php namespace Dashboard\Api;

use Dashboard\Crm\Contact;
use Dashboard\Transformers\contactTransformer;
use Illuminate\Support\Facades\Input;


class ApiContactsController extends ApiController {

    /**
     * Transforms DB output to output consistent with the API docs
     * @var
     */
    protected $contactTransformer;

    function __construct(contactTransformer $contactTransformer)
    {
        $this->contactTransformer = $contactTransformer;
        $this->setEntityType('Contact');
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $contacts = Contact::all()->take(10);

        return $this->respond([
            'data' => $this->contactTransformer->transformCollection($contacts->toArray()),
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //this shouldn't be a method should it?
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        var_dump(Input::all());
		// Do validation
        if ( ! Input::get('last_name'))
        {
            return $this->respondValidationFailed('You need to include last_name');
        }

        Contact::create(Input::all());

        return $this->respondCreated();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $contact = Contact::find($id);

        if ( ! $contact) return $this->respondNotFound();

        return $this->respond([
            'data' => $this->contactTransformer->transform($contact),
        ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //return View::make('apicontacts.edit');
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
        var_dump(Input::all());
        foreach (Input::all() as $k => $v)
        {
            $contact->$k = $v;
        }
        $contact->save();
        return $contact;
        return $this->respondUpdated();
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
