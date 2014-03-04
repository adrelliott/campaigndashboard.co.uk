<?php namespace Dashboard\Sales;

use BaseController;
use Dashboard\Repositories\OrderRepositoryInterface as ModelInterface;

class OrdersController extends BaseController {

    protected $modulename = 'sales';
    protected $foldername = 'orders';


    public function __construct(ModelInterface $repo)
    {
        parent::__construct($repo);
    } 


    
//     /**
//      * Display a listing of the resource.
//      *
//      * @return Response
//      */
//     public function index()
//     {
//         return $this->render();
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return Response
//      */
//     public function create()
//     {
//         return $this->render()->withRecord( new Model );
//     }


//     /**
//      * Store a newly created resource in storage.
//      *
//      * @return Response
//      */
//     public function store()
//     {   
//         $record = new Model;
// \Debug::dump(Input::all()); die($record->save());
//         // Has it saved?
//         if ( $record->save() )
//         {
//             if (Request::ajax()) return Response::make('', 200, array('Content-Type' => 'text/plain'));
//             else return Redirect::route('app.' . $this->foldername . '.edit', array($record->id))
//                 ->with('success', 'That\'s saved!');
//         }
//         else
//         {
//             if (Request::ajax()) return Response::make('', 500, array('Content-Type' => 'text/plain'));
//             else return Redirect::back()
//                 ->with('error', 'Some fields don\'t look right. Can you take a look?')
//                 ->withErrors($record->errors())
//                 ->withInput();

//         }
//     }

//     /**
//      * Display the specified resource. (Can we be used to show a non-editable record, e.g. if permissions are not adequate to edit)
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function show($id)
//     {
//         return $this->render()->withRecord( Model::findOrFail($id) );
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function edit($id)
//     {
//         return $this->render()->withRecord( Model::findOrFail($id) );
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function update($id)
//     {
//         //die(\Debug::dump(\Input::all()));
//         $record = Model::findOrFail($id);

//         // Has it saved?
//         if ( $record->save() )
//         {
//             if (Request::ajax()) return Response::make('', 202, array('Content-Type' => 'text/plain'));
//             else return Redirect::route('app.' . $this->foldername . '.edit', array($record->id))
//                 ->with('success', 'That\'s saved!');
//         }
//         else
//         {
//             if (Request::ajax()) return Response::make('', 500, array('Content-Type' => 'text/plain'));
//             else return Redirect::back()
//                 ->with('error', 'Some fields don\'t look right. Can you take a look?')
//                 ->withErrors($record->errors());
//         }

//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return Response
//      */
//     public function destroy($id)
//     {
//         //Form submists as DELETE to notes/$id
//     }

}