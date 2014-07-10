<?php namespace Dashboard\Repositories;

use Dashboard\Repositories\EloquentContactRepository;
use Dashboard\Me\ContactLogin, Dashboard\Crm\Contact as Model;

class ClientContactRepository extends EloquentContactRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($hash)
    {
        $this->r = ContactLogin::with('contact')
            ->where('hash', '=', $hash)->firstOrFail()
            ->contact;
        
        return $this->r;
    }
}