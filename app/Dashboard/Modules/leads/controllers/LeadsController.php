<?php namespace Dashboard\Leads;

//** Amend anything caled Lead **//


use BaseController, Auth, Response;
use Dashboard\Repositories\LeadRepositoryInterface as ModelInterface;

class LeadsController extends BaseController {

    protected $modulename = 'leads';
    protected $foldername = 'lead';
    

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}