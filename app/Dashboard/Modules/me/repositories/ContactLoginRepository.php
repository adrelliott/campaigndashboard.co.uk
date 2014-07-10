<?php namespace Dashboard\Repositories;

use Dashboard\Repositories\EloquentContactRepository;
use Dashboard\Me\ContactLogin as Model;

/**
 * We want to override the ContactRepository for finding by the public-safe
 * URL hash rather than exposing the ID directly in the URL.
 */
class ContactLoginRepository extends EloquentRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($hash)
    {
        $this->r = $this->model->where('hash', '=', $hash)
            ->firstOrFail();
        
        return $this->r;
    }
}