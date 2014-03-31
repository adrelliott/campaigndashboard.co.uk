<?php namespace Dashboard\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;

class Presenter extends BasePresenter {

     public function toPounds($price)
     {
         return $price / 100;
     }
}