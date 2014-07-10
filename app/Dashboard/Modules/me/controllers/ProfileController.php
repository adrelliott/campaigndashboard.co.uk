<?php namespace Dashboard\Me;

use CrudController;
use Dashboard\Repositories\ContactLoginRepository;

class ProfileController extends CrudController
{
    public function __construct(ContactLoginRepository $repo)
    {
        parent::__construct($repo);
    }
}