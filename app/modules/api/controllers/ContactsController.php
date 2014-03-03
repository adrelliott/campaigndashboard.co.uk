<?php namespace Dashboard\Api;

use BaseController, Auth, Response;
use Dashboard\Api\ApiController;
use Dashboard\Api\Repositories\ContactApiRepositoryInterface as ModelInterface;

class ContactsController extends ApiController {

    public function __construct(ModelInterface $model)
    {
        parent::__construct($model);
    }


}