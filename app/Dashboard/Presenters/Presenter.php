<?php namespace Dashboard\Presenters;

use Config;
use McCool\LaravelAutoPresenter\BasePresenter;

class Presenter extends BasePresenter {

    protected $tables = array();

     public function toPounds($price)
     {
         return $price / 100;
     }


    // Tables
    public function createTable($tableName)
    {
        dd('this is the table machine');
    }
    
}