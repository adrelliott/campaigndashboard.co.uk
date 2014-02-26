<?php namespace Dashboard\Admin;

use BaseController;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;

class UsersController extends BaseController {
    
    protected $modulename = 'crm';
    protected $foldername = 'contacts';


    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    } 

}