<?php namespace Dashboard\Me;

use CrudController;
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
        $contactRecord = $this->contactRepo->find($login->contact_id);

        return $this->renderView($login)
            ->withContact($contactRecord);
    }
}