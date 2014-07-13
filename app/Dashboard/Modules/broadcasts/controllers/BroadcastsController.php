<?php namespace Dashboard\Broadcasts;

use CrudController;
use Dashboard\Repositories\BroadcastRepositoryInterface as ModelInterface;

class BroadcastsController extends CrudController {

    public function __construct(ModelInterface $repo)
    // public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}