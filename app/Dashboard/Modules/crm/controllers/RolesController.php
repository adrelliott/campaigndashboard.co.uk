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
        $contact = $this->repo->find($contactId);

        $this->fireEvent();
        
        $options = with( new DatatableService(Input::getFacadeApplication()['request'], $this->repo) )->fetchOptions();

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

    public function create()
    {
        $contactId = func_get_arg(0);
        $contact = $this->repo->find($contactId);
        $roles = Role::onlyOwners()->lists('role');

        return $this->renderView()
            ->withContact($contact)
            ->withRoles($roles);
    }

    public function store()
    {
        $contactId = func_get_arg(0);
        $roleId = Input::get('role_id');

        $contact = $this->repo->find($contactId);
        $role = Role::find($roleId);

        $contact->roles()->attach($role, Input::only( 'season', 'notes', 'start', 'end' ));
    }
}