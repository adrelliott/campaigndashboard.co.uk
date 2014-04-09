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


    // public function getRelated($id, $relatedModel)
    // {
    //     // Get this model and its related models
    //     $this->record = $this->repo->findRecord($id)->$relatedModel;
    //     return $this->getResponse();
    // }

   // public function getOrderProducts($id)
   // {
   //      return $this->getRelated($id, 'orderProducts', 'orderProducts.product');
   //      $this->record = $this->repo->findRecord($id, 'orderProducts.product')->orderProducts;
   //      return $this->handleResponse();
   // }

   



   // public function getResponse()
   // {
   //      if ( Input::has('datatables') )
   //          return $this->repo->toDataTable($this->record);

   //      return $this->record;
   // }









    // public function index()
    // {
    //     if(Datatable::shouldHandle())
    //     {
    //         return Datatable::collection($this->repo->all(array('id','first_name', 'owner_id')))
    //         ->showColumns('id', 'first_name', 'owner_id')
    //         ->searchColumns('first_name')
    //         ->orderColumns('id','first_name')
    //         ->make();
    //     }
    //     else
    //     {
    //         return parent::index();
    //     }
    // }


/** pretty sure this should be in the repo ********************************/
    public function storeRole()
    {
        // 1. Get the contact model
        $contact = $this->repo->findRecord(Input::get('contact_id'));

        // Set up the role...
        $role = new Role(Input::all());
        $role->owner_id = Auth::user()->owner_id;
    
        // Now add the role
        $result = $contact->roles()->save($role);

        return $role;
    }



    // public function getAllTags($contactId)
    // {
    //     // return 'showing all tags for contact ' . $contactId;
    //     $this->record = $this->repo->getTags($contactId);


    //     # If its a datatables request, then send the collection to the makeDataTable() method
        

    //     if ( Input::get('datatables') )
    //     {

    //     }
    // }


}