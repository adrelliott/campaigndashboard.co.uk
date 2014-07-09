<?php namespace Dashboard\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

class Presenter extends BasePresenter {

    public function __construct(Model $model)
    {
        $this->resource = $model;    
    }
}