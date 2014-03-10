<?php namespace Dashboard\Crm;

use BaseController;
use Dashboard\Repositories\ContactRoleRepositoryInterface as ModelInterface;


class RolesController extends BaseController {
    
    protected $modulename = 'crm';
    protected $foldername = 'roles';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

    

}