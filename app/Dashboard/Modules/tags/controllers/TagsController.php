<?php namespace Dashboard\Tags;

use CrudController;
use Dashboard\Repositories\TagRepositoryInterface as ModelInterface;

class TagsController extends CrudController {


    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }

   



}