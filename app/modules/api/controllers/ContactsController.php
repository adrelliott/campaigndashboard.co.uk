<?php namespace Dashboard\Api;

use BaseController;
use Dashboard\Api\ApiController;
use Dashboard\Api\Repositories\ContactApiRepositoryInterface as ModelInterface;
use Dashboard\Tags\Role;

class ContactsController extends ApiController {

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }

    public function storeRole($contact_id)
    {
        // 1. Get the contact model
        $contact = $this->repo->findRecord($id);
        $role = new Role(\Input::all());

    $role->owner_id = 10222;
    

    // Now add the role
    $result = $contact->roles()->save($role);

    //return $contact->roles;

    }

}