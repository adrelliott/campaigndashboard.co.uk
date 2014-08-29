<?php namespace Dashboard\Crm;

use CrudController, Input;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;
use Dashboard\Services\DatatableService;

class RolesController extends CrudController {
    

    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

    public function index()
    {
        $contactId = func_get_arg(0);
        $this->fireEvent();
        
        $options = with( new DatatableService(Input::getFacadeApplication()['request'], $this->repo) )->fetchOptions();
        $contact = $this->repo->find($contactId);

        $query = $contact->roles()
            ->orderBy($options['order'], $options['dir']);

        if ($options['search'])
            $query->searchColumns($options['search'], $options['columns']);

        $count = clone $query;

        $results = $query->get();
        $total = $count->count();

        return $this->render($this->classAttributes[2] . '._row_json')
            ->withTotal($total)
            ->withDraw((int)Input::get('draw'))
            ->withResults($results);
    }
}