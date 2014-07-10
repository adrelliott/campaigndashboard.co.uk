<?php namespace Dashboard\Me;

use CrudController;
use Dashboard\Repositories\MeContactRepository;

class ProfileController extends CrudController
{
    public function __construct(MeContactRepository $repo)
    {
        parent::__construct($repo);
    }

    /**
     * I'm anonymising the contact ID and using a special hash in the URL for
     * public-facing URLs
     */
    public function show($hash)
    {
        $this->record = $this->repo->find($hash);
    }
}