<?php

namespace Dashboard\Admin;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use \BaseModel;

class User extends BaseModel implements UserInterface, RemindableInterface {


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'owner_id', 'admin_level');


    /**
     * Determine what can be mass assigned
     * 
     * @var array
     */
    protected $fillable = array('email', 'first_name', 'last_name', 'password', 'password_confirmation', 'company', 'home_phone', 'mobile_phone');


    /**
     * Validation rules for Users
     * 
     * @var array
     */
    public static $rules = array(
        'create' => array(  // Rules for just creation
            'password' => 'sometimes|required|alpha_num|min:8|confirmed',
            'password_confirmation' => 'sometimes|required|alpha_num|min:8',
        ),
        'update' => array(  //Rules for just updating
            // use these rules only on update
        ),
        'save' => array(    // rules for both create & update
            'email' => 'required|email',
        )
    );

    /**
     * Hash password field
     * @var array (usually just 'password' field)
     */
    public static $passwordAttributes  = array('password');
    public $autoHashPasswordAttributes = true;


    /**
    * Actions relationship
    */
    public function actions()
    {
        return $this->hasMany('Dashboard\Crm\Action');
    }


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

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}