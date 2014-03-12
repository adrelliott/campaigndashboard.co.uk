<?php namespace Dashboard\Crm;

use BaseController;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;


class ContactsController extends BaseController {
    
    protected $modulename = 'crm';
    protected $foldername = 'contacts';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

/** pretty sure this should be in the repo ********************************/
    public function storeRole()
    {
        // 1. Get the contact model
        $contact = $this->repo->findRecord(Input::get('contact_id'));

        // Set up the role...
        $role = new Role(Input::all());
        $role->owner_id = Auth::user()->owner_id;
    
        // Now add the role
        $result = $contact->roles()->save($role);

        return $role;
    }

}