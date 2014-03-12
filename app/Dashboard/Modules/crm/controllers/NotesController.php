<?php namespace Dashboard\Crm;

use BaseController;
use Dashboard\Repositories\NoteRepositoryInterface as ModelInterface;


class NotesController extends BaseController {
    
    
    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}