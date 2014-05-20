<?php namespace Dashboard\Homepage;
use BaseController;


// ****** temporaray model!!!!!!!!!! **** should be saved search
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;


class HomepageController extends BaseController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }


}
