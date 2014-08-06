<?php namespace Dashboard\Me;

use \BaseModel;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use \Dashboard\Crm\Contact;

class ContactLogin extends BaseModel implements UserInterface, RemindableInterface
{
    protected $hidden = array('password', 'owner_id', 'authenticate_salt');
    protected $fillable = array('email', 'password', 'password_confirmation');

    protected static $relationships = array(
        'contact' => array( 'belongsTo', "\Dashboard\Crm\Contact" )
    );

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

    public static function authenticateFromSignature(ContactLogin $login, $signature)
    {
        return ($signature == $login->authentication_signature);
    }

    public function getAuthenticationSignatureAttribute()
    {
        return sha1($this->id . $this->contact_id . $this->authenticate_salt);
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken() { return $this->remember_token; }
    public function setRememberToken($value) { $this->remember_token = $value; }
    public function getRememberTokenName() { return 'remember_token'; }
}