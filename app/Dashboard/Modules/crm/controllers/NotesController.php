<?php namespace Dashboard\Crm;

use CrudController;
use Dashboard\Repositories\NoteRepositoryInterface as ModelInterface;


class NotesController extends CrudController {
    
    
    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

}