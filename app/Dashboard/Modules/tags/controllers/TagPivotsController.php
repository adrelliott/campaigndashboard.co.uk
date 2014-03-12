<?php namespace Dashboard\Tags;

use BaseController;
use Dashboard\Repositories\TagPivotRepositoryInterface as ModelInterface;

class TagPivotsController extends BaseController {

    protected $modulename = 'tags';
    protected $foldername = 'tagpivot';

    /**
     * Sets up the model object
     * @param ModelInterface  Interface
     */
    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}