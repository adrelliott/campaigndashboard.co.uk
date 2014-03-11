<?php namespace Dashboard\Repositories;

use Dashboard\Crm\Note as Model;

class EloquentNoteRepository extends EloquentRepository implements NoteRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}