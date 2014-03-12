<?php namespace Dashboard\Leads;


use BaseController, Auth, Response;
use Dashboard\Repositories\LeadRepositoryInterface as ModelInterface;

class LeadsController extends BaseController {

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}