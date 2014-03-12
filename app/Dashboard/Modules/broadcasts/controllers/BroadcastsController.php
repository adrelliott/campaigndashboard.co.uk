<?php namespace Dashboard\Broadcasts;

use BaseController;
use Dashboard\Repositories\BroadcastRepositoryInterface as ModelInterface;


class BroadcastsController extends BaseController {
    
    protected $modulename = 'broadcasts';
    protected $foldername = 'broadcasts';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}