<?php namespace Dashboard\Crm;

use McCool\LaravelAutoPresenter\BasePresenter;
use Dashboard\Crm\Contact as Model;
use Dashboard\Crm\Action as Action;
use Dashboard\Crm\Note as Note;
use Dashboard\Crm\Tag as Tag;
use Dashboard\Admin\User as User;
use Carbon;

class ContactPresenter extends BasePresenter {

     public function __construct(Model $model)
    {
        $this->resource = $model;
    }

    public function fullName()
    {
        //Do we have first name?
        if ( isset($this->resource->first_name) )
            return 'This is ' . $this->resource->first_name . ' ' . $this->resource->last_name;
        
        //if not, do we have title?
        if ( isset($this->resource->title) )
            return 'This is ' . $this->resource->title . ' ' . $this->resource->last_name;
        
        //If not, put 
        return 'You only know this contact by their surname (' . $this->resource->last_name . ')';
    }

    public function created_at()
    {
        return $this->resource->created_at->diffForHumans();
    }

    public function getNotes()
    {
        // return Note::where('contact_id', $this->resource->id)->get();
        // return Note::where('contact_id', $this->resource->id)->get();
        //return Note::with('user')->get();
    }

    public function getActions()
    {
        //Get associated records
        //$this->resources = Action::get() 


        return $this->resource->actions;
    }

    public function user_name($user_id)
    {
        $user = User::find($user_id);

        return $user->first_name . ' ' . $user->last_name;
    }

}