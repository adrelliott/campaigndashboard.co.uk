<?php namespace Dashboard\Template;

use BaseController;
use Dashboard\Repositories\TemplateRepositoryInterface as ModelInterface;

class TemplatesController extends BaseController {


    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}