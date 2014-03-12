<?php namespace Dashboard\Leads;

use McCool\LaravelAutoPresenter\BasePresenter;

// use Dashboard\Crm\Contact as Model;
// use Dashboard\Crm\Action as Action;
// use Dashboard\Crm\Note as Note;
// use Dashboard\Crm\Tag as Tag;
// use Dashboard\Admin\User as User;

use Carbon;

class LeadPresenter extends BasePresenter {

     public function __construct(Model $repo)
    {
        $this->resource = $repo;
    }

    // public function fullName()
    // {
    //     //Do we have first name?
    //     if ( isset($this->resource->first_name) )
    //         return 'This is ' . $this->resource->first_name . ' ' . $this->resource->last_name;
        
    //     //if not, do we have title?
    //     if ( isset($this->resource->title) )
    //         return 'This is ' . $this->resource->title . ' ' . $this->resource->last_name;
        
    //     //If not, put 
    //     return 'You only know this contact by their surname (' . $this->resource->last_name . ')';
    // }

    // public function created_at()
    // {
    //     return $this->resource->created_at->diffForHumans();
    // }


}