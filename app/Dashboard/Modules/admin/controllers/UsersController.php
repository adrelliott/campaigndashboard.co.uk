<?php namespace Dashboard\Admin;

use BaseController, Redirect;
use Dashboard\Repositories\UserRepositoryInterface as ModelInterface;

class UsersController extends BaseController {
   
   
    /**
     * Sets up the model object
     * @param ModelInterface $model Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }

   

}