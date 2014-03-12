<?php namespace Dashboard\Repositories;

use Dashboard\Broadcasts\Broadcast as Model;

class EloquentBroadcastRepository extends EloquentRepository implements BroadcastRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}