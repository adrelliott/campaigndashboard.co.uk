<?php
use LaravelBook\Ardent\Ardent;

class Contact extends Ardent {
	
    //Do not allow updating of these fields
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    //When we call User::destroy(1); it actually only soft deletes the record
    protected $softDelete = true;

    //Ardent ensures that the $_POST values are injected into the model ready to send
    public $forceEntityHydrationFromInput = true;
    
    //Validation rules
	public static $rules = array(
        'first_name'                  => 'between:2,32',
        'last_name'                  => 'required|between:2,32',
        'email'                 => 'email',
    );


    
    public static function getAllContacts()
    {
        $defaults = array(
            'cols' => 'contacts.id,contacts.first_name,contacts.last_name',
            'where' => ''
            );

        //Get all the URL paramaters 
        $params = Input::all();
        foreach ($params as $p => $val)
        {
            if (array_key_exists($p, $defaults))
            {
                $defaults[$p] = str_replace(' ', '', $val);
            }
        }

        //Return the JSON
        $contacts = Contact::select(explode(',', $defaults['cols']));
        return Datatables::of($contacts)->make();
    }
 
}
