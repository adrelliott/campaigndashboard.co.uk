<?php namespace Dashboard\Crm;

use BaseController;
use View;
use Datatable;
use Input;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;


class ContactsController extends BaseController {

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

   public function getOrderProducts($id)
   {
        return $this->getRelated($id, 'orderProducts', 'orderProducts.product');
   }

   


}