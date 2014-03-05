<?php namespace Dashboard\Api;

use BaseController;
use Dashboard\Api\ApiController;
use Dashboard\Api\Repositories\BroadcastApiRepositoryInterface as ModelInterface;

class BroadcastsController extends ApiController {

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}