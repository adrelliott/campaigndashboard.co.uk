<?php

namespace Dashboard\App\Crm;
use McCool\LaravelAutoPresenter\BasePresenter;

//Pull in the models required for this record
use Dashboard\App\Crm\Contact as Model;
use Dashboard\App\Crm\Action as Action;
use Dashboard\App\Crm\Note as Note;
use Dashboard\App\Crm\Tag as Tag;

class ContactPresenter extends BasePresenter {

     public function __construct(Model $object)
    {
        $this->resource = $object;
    }

    public function fullName()
    {
        return 'This shoudl be full name';
    }

    public function test()
    {
        return 'id is ' . $this->resource->id;
    }

    public function getActions()
    {
        //Get associated records
        //$records = Action::get() 


        return $this->resource->actions;    }

}