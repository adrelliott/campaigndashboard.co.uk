<?php namespace Dashboard\Crm;

use CrudController, View, Request, Input;
use Dashboard\Repositories\SearchableContactRepositoryInterface as ModelInterface;

class ContactsController extends CrudController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);

        View::share('newDatatables', TRUE);
    }

}