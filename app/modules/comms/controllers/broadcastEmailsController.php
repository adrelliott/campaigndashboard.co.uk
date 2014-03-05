<?php namespace Dashboard\Comms;

//** Amend anything caled Comms **//


use BaseController, Auth, Response;
use Dashboard\Repositories\CommsRepositoryInterface as ModelInterface;

class BroadcastEmailsController extends BaseController {

    protected $modulename = 'Comms';
    protected $foldername = 'broadcastemails';
    

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}