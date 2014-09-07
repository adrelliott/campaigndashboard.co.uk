<?php namespace Dashboard\Services;

use Illuminate\Http\Request as Input;
use Dashboard\Repositories\EloquentRepository;

class DatatableService
{
    public function __construct(Input $input, EloquentRepository $repo)
    {
        $this->input = $input;
        $this->repo = $repo;
    }

    public function run()
    {
        $options = $this->fetchOptions();
        $query = $this->repo
            ->orderBy($options['order'], $options['dir']);

        if ($options['search'])
            $query->searchColumns($options['search'], $options['columns']);

        $count = clone $query;
        $total = $count->count();

        $results = $query->take($options['limit'])
            ->skip($options['skip'])
            ->get();
        
        return array( $results, $total );
    }

    /**
     * Pull the search options (ordering, sorting, pagination et cetera) from a
     * datatables request and return the array.
     */
    public function fetchOptions()
    {
        $q = $this->input->input('q');
        $inputColumns = $this->input->input('columns');
        $columns = array_map(function($c){ return $c['name']; }, $inputColumns);
        $order = $this->input->input('order');

        return array(
            'order' => $columns[$order[0]['column']],
            'dir' => $order[0]['dir'],
            'limit' => $this->input->input('length'),
            'skip' => $this->input->input('start'),
            'columns' => $columns,
            'search' => $this->input->input('search.value')
        );
    }
}