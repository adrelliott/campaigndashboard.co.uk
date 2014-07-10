<?php namespace Dashboard\Search;

use CrudController;
use Dashboard\Repositories\SegmentRepositoryInterface as ModelInterface;


class SegmentsController extends CrudController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

}