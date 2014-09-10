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

    // This shuld be in the trasnformer or the validation class
    public $allowable =  ['title', 'first_name', 'last_name', 'nickname', 'email', 'email2', 'mobile_phone',
        'home_phone', 'work_phone', 'overseas_phone', 'address1', 'company', 'address2', 'address3', 'city', 'postcode', 'county', 'country',
        'legacy_id', 'record_type', 'gender', 'date_of_birth', 'twitter_id', 'optin_email', 'optin_sms', 'optin_post'];


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
        $input = Input::only($this->allowable);
        $contact = Contact::find($id);
        $contact->fill($input);

        if ( ! $contact->save()) return $this->respondValidationFailed($contact->errors());

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
