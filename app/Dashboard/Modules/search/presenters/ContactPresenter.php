<?php namespace Dashboard\Search;

use McCool\LaravelAutoPresenter\BasePresenter as Presenter;
use Dashboard\Search\Segment as Model;
use Carbon;

class SegmentPresenter extends Presenter {

    public function __construct(Model $model)
    {
        $this->resource = $model;
    }

    

    
}