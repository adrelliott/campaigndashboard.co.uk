<?php namespace Dashboard\Api;

use Controller, Response, Request, Input;
use Bllim\Datatables\Datatables;

class ApiController extends Controller {

    protected $repo;

    protected $result;

    protected $user;


    
    
    
    /**
     * init the repo
     * @param Repository $repo The repository interface
     */
    public function __construct($repo = NULL)
    {
        $this->repo = $repo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Filter through the supplied params & set shit up
        $params = array();
        // foreach ( $this->params as $p)
        // {
        //     if ( $v = Input::get($p) ) $params[$p] = $v;
        // }

        $r = $this->repo->getAll($params);

        return Response::json(array(
            'error' => false,
            'data' => $r->toArray(),
            200
            )
        );
    }

    public function test()
    {
        dd('this is test in apucontroller');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexDatatables()
    {
        // $r = $this->repo->getAll();
        dd('datatab,es');
        // return Datatables::of($r)->make();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}