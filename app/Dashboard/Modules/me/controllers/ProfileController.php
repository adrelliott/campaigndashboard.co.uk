<?php namespace Dashboard\Me;

use CrudController;
use URL;
use Dashboard\Repositories\ContactLoginRepository;
use Dashboard\Repositories\ContactRepositoryInterface;

class ProfileController extends CrudController
{
    public function __construct(ContactLoginRepository $repo, ContactRepositoryInterface $contactRepo)
    {
        parent::__construct($repo);

        $this->contactRepo = $contactRepo;
    }

    public function show($hash)
    {
        $login = $this->repo->find($hash);
        $contactRecord = $login->contact;

        return $this->renderView($login)
            ->withContact($contactRecord);
    }

    public function editRoute($viewFile = 'edit')
    {
        return URL::route('me', array( $this->model->hash ));
    }
}