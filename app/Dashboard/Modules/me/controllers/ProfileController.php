<?php namespace Dashboard\Me;

use CrudController;
use Dashboard\Repositories\ContactLoginRepository;

class ProfileController extends CrudController
{
    public function __construct(ContactLoginRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * I'm anonymising the contact ID and using a special hash in the URL for
     * public-facing URLs
     */
    public function show($hash)
    {
        $this->model = $this->repo->find($hash);

        $this->fireEvent();
        return $this->handleResponse();
    }
}