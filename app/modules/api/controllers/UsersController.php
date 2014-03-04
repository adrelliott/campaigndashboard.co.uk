<?php namespace Dashboard\Api;

use BaseController, Auth, Response;
use Dashboard\Api\Repositories\UserRepositoryInterface as ModelInterface;

class UsersController extends BaseController {

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}