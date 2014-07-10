<?php namespace Dashboard\Me;

use CrudController;
use URL;
use Dashboard\Repositories\ContactLoginRepository;
use Dashboard\Repositories\ClientContactRepository;

class ContactController extends CrudController
{
    public function __construct(ClientContactRepository $repo)
    {
        parent::__construct($repo);
    }

    public function editRoute($viewFile = 'edit')
    {
        return URL::route('me', array( $this->model->login->hash ));
    }
}