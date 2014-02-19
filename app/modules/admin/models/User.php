<?php

namespace Dashboard\App\Admin;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use \BaseModel;

class User extends BaseModel implements UserInterface, RemindableInterface {


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    /**
     * Determine what can be mass assigned
     * 
     * @var array
     */
    protected $fillable = array('email', 'first_name', 'last_name');

    /**
     * Remove reduntant data (like password confirmation field)
     * @var boolean
     */
    // public $autoPurgeRedundantAttributes = true;

    /**
     * Validation rules for Users
     * 
     * @var array
     */
    public static $rules = array(
        // 'email' => 'required|email',
        // 'password' => 'required|alpha_num|min:8|confirmed',
        // 'password_confirmation' => 'required|alpha_num|min:8',
    );

    /**
    * NOtes relationship
    */
    // public function note()
    // {
    //     return $this->hasMany('Dashboard\App\Crm\Note');
    // }
    

    /**
    * Actions relationship
    */
    // public function action()
    // {
    //     // return $this->hasMany('Action');
    // }

    /**
    * NOtes relationship
    */
    // public function note()
    // {
    //     return $this->hasMany('Dashboard\App\Crm\Note');
    // }


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}