<?php namespace Dashboard\Tags;

use McCool\LaravelAutoPresenter\BasePresenter;
use Dashboard\Tags\TagPivot as Model;
// use Dashboard\Crm\Action as Action;
// use Dashboard\Crm\Note as Note;
// use Dashboard\Crm\Tag as Tag;
// use Dashboard\Admin\User as User;

use Carbon;

class TagPivotPresenter extends BasePresenter {

     public function __construct(Model $repo)
    {
        $this->resource = $repo;
    }

    


}