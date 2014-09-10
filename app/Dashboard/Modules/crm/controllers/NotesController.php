<?php namespace Dashboard\Crm;

use CrudController, Input, Request, Response, Redirect;
use Dashboard\Repositories\ContactRepositoryInterface as ModelInterface;
use Dashboard\Services\DatatableService;


class NotesController extends CrudController {
    
    
    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    }

    public function index()
    {
        $contactId = func_get_arg(0);
        $contact = $this->repo->find($contactId);

        $this->fireEvent();

        $options = with( new DatatableService(Input::getFacadeApplication()['request'], $this->repo) )->fetchOptions();

        $query = $contact->notes()
            ->orderBy($options['order'], $options['dir']);

        if ($options['search'])
            $query->searchColumns($options['search'], $options['columns']);

        $count = clone $query;

        $results = $query->get();
        $total = $count->count();

        return $this->render($this->classAttributes[2] . '._row_json')
            ->withTotal($total)
            ->withDraw((int)Input::get('draw'))
            ->withResults($results)
            ->withContact($contact);
    }

}