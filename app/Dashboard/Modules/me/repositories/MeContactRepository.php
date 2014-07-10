<?php namespace Dashboard\Repositories;

use Dashboard\Repositories\EloquentContactRepository;
use Dashboard\Crm\Contact as Model;

/**
 * We want to override the ContactRepository for finding by the public-safe
 * URL hash rather than exposing the ID directly in the URL.
 */
class MeContactRepository extends EloquentContactRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($hash)
    {
        $this->r = $this->model->where('hash', '=', $hash)
            ->first();
        die(var_dump($this->r));
        return $this->r;
    }
}