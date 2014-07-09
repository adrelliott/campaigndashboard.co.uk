<?php namespace Dashboard\Crm;

use CrudController;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;


class ContactsController extends CrudController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

}