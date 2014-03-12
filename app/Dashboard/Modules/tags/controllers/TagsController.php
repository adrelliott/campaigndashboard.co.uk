<?php namespace Dashboard\Tags;

use BaseController;
use Dashboard\Repositories\TagRepositoryInterface as ModelInterface;

class TagsController extends BaseController {


    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}