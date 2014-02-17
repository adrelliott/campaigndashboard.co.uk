<?php 

//Set up the namespace
namespace Dashboard\App\Crm;

//What classes are we going to use?
use \BaseController;
use Dashboard\App\Crm\Contact as Model;


class ContactsController extends BaseController {
    
    protected $modulename = 'crm';
    protected $foldername = 'contacts';
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->render();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {   
        return $this->saveRecord( new Model );
    }

    /**
     * Display the specified resource. (Can we be used to show a non-editable record, e.g. if permissions are not adequate to edit)
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->render()->withRecord( Model::findOrFail($id) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->render()->withRecord( Model::findOrFail($id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return $this->saveRecord( Model::findOrFail($id) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Form submists as DELETE to contacts/$id
    }

}