<?php namespace Dashboard\Crm;

use CrudController;
use Dashboard\Repositories\ContactRoleRepositoryInterface as ModelInterface;


class RolesController extends CrudController {
    

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

    

}