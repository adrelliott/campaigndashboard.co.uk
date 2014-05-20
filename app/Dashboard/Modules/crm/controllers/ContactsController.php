<?php namespace Dashboard\Crm;

use BaseController;
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

















/* USE THIS METHOD TO TEST THE REPO */

    public function test($id = NULL)
    {
        // Find indivisual records
        // $this->record = $this->repo->findOrFail(1);
        // $this->record = $this->repo->where('first_name', 'al')->first();
        // $this->record = $this->repo->where('first_name', 'al')->firstOrFail();
        // $this->record = $this->repo->where('first_name', 'al')->pluck('last_name');
        // $this->record = $this->repo->lists('last_name', 'owner_id');
        // $this->record = $this->repo->select('first_name', 'last_name')->get()->toArray();
        // $this->record = $this->repo->distinct()->get()->toArray();
        // $this->record = $this->repo->select('first_name as user_name')->get()->toArray();
        // $this->record = $this->repo->select('first_name');
        // $this->record = $this->repo->addSelect('owner_id')->get()->toArray();
        // $this->record = $this->repo->with('orders', 'orderProducts')->find(1)->toArray();
        // 
        $this->record = $this->getRelated(1, 'orderProducts', 'orderProducts.product')->toArray();
        // 
        // $this->record = $this->repo->findOrFail(1)->toArray();
        // $this->record = $this->repo->firstOrFail()->toArray();
        // $this->record = $this->repo->whereBetween('id', array(1, 27))->get()->toArray();
        // $this->record = $this->repo->where('first_name', 'al')->pluck('last_name');
        // 
        // $this->record = $this->repo->getRelated(1,'notes', null)->toArray();
        // 
        // $this->record = $this->repo->();
        // $this->record = $this->repo->test();
        // $this->record = $this->repo->test();
        // 
        // 
        // $this->record = $this->repo->firstOrFail();
        
        // Find collections
        // $this->record = $this->repo->all();








dump(\DB::getQueryLog());
        // return $this->record;
        return dump($this->record);
        
    }


}