<?php namespace Dashboard\Me;

use CrudController;
use Dashboard\Repositories\ContactLoginRepository;
use Dashboard\Repositories\ContactRepositoryInterface;

class ContactController extends CrudController
{
    public function __construct(ContactRepositoryInterface $repo)
    {
        parent::__construct($repo);
    }
}