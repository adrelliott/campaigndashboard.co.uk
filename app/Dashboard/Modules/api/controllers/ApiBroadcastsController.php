<?php namespace Dashboard\Api;

use Dashboard\Api\ApiController;
use Dashboard\Repositories\BroadcastRepositoryInterface as ModelInterface;


class ApiBroadcastsController extends ApiController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

    

}