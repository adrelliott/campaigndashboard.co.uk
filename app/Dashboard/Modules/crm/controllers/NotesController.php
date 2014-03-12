<?php namespace Dashboard\Crm;

use BaseController;
use Dashboard\Repositories\NoteRepositoryInterface as ModelInterface;


class NotesController extends BaseController {
    
    protected $modulename = 'crm';
    protected $foldername = 'notes';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}