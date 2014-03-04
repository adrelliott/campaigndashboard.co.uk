<?php namespace Dashboard\Crm;

use BaseController;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;


class ContactsController extends BaseController {
    
    protected $modulename = 'crm';
    protected $foldername = 'contacts';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 

}