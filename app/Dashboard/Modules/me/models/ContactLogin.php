<?php namespace Dashboard\Me;

use \BaseModel;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class ContactLogin extends BaseModel implements UserInterface
{
    protected $hidden = array('password', 'owner_id', 'authenticate_salt');
    protected $fillable = array('email', 'password', 'password_confirmation');

    public static $rules = array(
        'create' => array(
            'password' => 'sometimes|required|alpha_num|min:8|confirmed',
            'password_confirmation' => 'sometimes|required|alpha_num|min:8'
        ),
        'update' => array(
            // use these rules only on update
        ),
        'save' => array(
            'email' => 'required|email',
        )
    );

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken() { return $this->remember_token; }
    public function setRememberToken($value) { $this->remember_token = $value; }
    public function getRememberTokenName() { return 'remember_token'; }
}