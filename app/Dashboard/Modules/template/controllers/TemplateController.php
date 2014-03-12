<?php namespace Dashboard\Template;

//** Amend anything caled Template **//


use BaseController, Auth, Response;
use Dashboard\Repositories\TemplateRepositoryInterface as ModelInterface;

class TemplatesController extends BaseController {

    protected $modulename = 'template';
    protected $foldername = 'template';
    

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}