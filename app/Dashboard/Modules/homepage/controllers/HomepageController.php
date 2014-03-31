<?php namespace Dashboard\Homepage;
use BaseController;


// ****** temporaray model!!!!!!!!!! **** should be saved search
use Dashboard\Repositories\OrderRepositoryInterface as SavedSearchInterface;



class HomepageController extends BaseController {


    /**
     * Pass the models required throgh here (like saved search )
     * @param SavedInterface $repo [description]
     */
    public function __construct(SavedSearchInterface $repo)
    {
        parent::__construct($repo);
    } 

}
