<?php namespace Dashboard\Api;

use BaseController;
use Dashboard\Api\ApiController;
use Dashboard\Api\Repositories\ContactRoleApiRepositoryInterface as ModelInterface;

class ContactsRolesController extends ApiController {

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}