<?php
use LaravelBook\Ardent\Ardent;

class Contact extends Ardent {
	
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    protected $softDelete = true;

    public $autoHydrateEntityFromInput = true;
    
	public static $rules = array(
        'first_name'                  => 'between:2,32',
        'last_name'                  => 'required|between:2,32',
        'email'                 => 'email',
    );
}
