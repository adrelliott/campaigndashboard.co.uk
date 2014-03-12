<?php namespace Dashboard\Api;

use Controller, Response, Request, Input;


class ApiController extends Controller {

    protected $repo;

    protected $result;

    protected $user;

    /**
     * List of response codes. Note the (int) values of the codes are valid HTTP responses
     * but the decimal points allow us to set our own messages
     * @var array
     */
    protected $responses = array(
        200 => FALSE,
        400.1 => 'You need to set the columns to return',
        500.0 => 'I have NO idea what went wrong',
        500.1 => 'The query failed to perform',
        500.2 => 'This method does not exist',
        );

    
    
    
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
        $this->result = $this->repo->getAll();

        if ( Input::has('datatables') ) return $this->result;
        
        else return $this->returnJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->result->responseCode = 500.2;
        return $this->returnJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->result = $this->repo->createRecord();

        if ($this->result->id) $this->result->responseCode = 200;

        return $this->returnJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->result = $this->repo->findRecord($id);
        if ($this->result->id) $this->result->responseCode = 200;

        return $this->returnJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->result->responseCode = 500.2;
        return $this->returnJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $this->result = $this->repo->updateRecord($id);
        //dd($this->result);
        return $this->returnJson();
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

    protected function returnJson()
    {
        // Set defaults
        $retval = array('message' => '', 'responseCode' => 500.0, 'data' => array());

        // Check for returned values
        if ( isset($this->result->responseCode) )
        {
            $retval['message'] = $this->responses[$this->result->responseCode];
            $retval['responseCode'] = (int)$this->result->responseCode;    
        }
        if ( $retval['responseCode'] < 300 ) $retval['data'] = $this->result->toArray();

        // Return to the browser
        return Response::json(
            array(
                'message' => $retval['message'],
                'data' => $retval['data']
            ),
            $retval['responseCode']
        );
    }


}