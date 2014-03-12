<?php namespace Dashboard\Comms;

use BaseController;
use Dashboard\Repositories\CommsRepositoryInterface as ModelInterface;

class BroadcastEmailsController extends BaseController {


    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}