<?php namespace Dashboard\Api;

use BaseController, Auth, Input;
use Dashboard\Api\ApiController;
use Dashboard\Api\Repositories\ContactApiRepositoryInterface as ModelInterface;
use Dashboard\Crm\ContactRole as Role;

class ContactsController extends ApiController {

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }

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