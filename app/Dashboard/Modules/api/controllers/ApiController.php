<?php namespace Dashboard\Api;


class ApiController extends Controller {

    public function __construct($repo = NULL)
    {
        parent::__construct($repo);
        $this->asJson = TRUE;
    }

    public function index()
    {
        $this->model = $this->repo->all();
        return parent::index();
    }

    public function show($id)
    {
       return 'Returning record ' . $id;
    }

    public function create()
    {
        return 'Creating a new record';
    }

    public function update()
    {
        $this->model = $this->repo->all();
        return parent::index();
    }
    public function destroy()
    {
        $this->model = $this->repo->all();
        return parent::index();
    }













    public function test($id = NULL)
    {
        $this->record = $this->getRelated(1, 'orderProducts', 'orderProducts.product')->toArray();
        dump(\DB::getQueryLog());
        return dump($this->record);
        
    }


}
