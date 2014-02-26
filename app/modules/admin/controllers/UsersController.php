<?php namespace Dashboard\Admin;

use BaseController;
use Dashboard\Repositories\UserRepositoryInterface as ModelInterface;

class UsersController extends BaseController {
    
    protected $modulename = 'admin';
    protected $foldername = 'users';


    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    } 

}