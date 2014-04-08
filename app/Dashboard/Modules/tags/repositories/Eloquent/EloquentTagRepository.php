<?php namespace Dashboard\Repositories;

use Dashboard\Tags\Tag as Model;

class EloquentTagRepository extends EloquentRepository implements TagRepositoryInterface {

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function getFor($dataTable = TRUE)
    {
        // I want to find all the tags that belong ot the contact
        
    }


    public function getFor1($dataTable = TRUE)
    {
        // all()
        $r = $this->all()->toArray(); dump($r);
        
        //find
        // $r = $this->find(7);

        //first of fail
        // $r = $this->q->where('tage_title', 'Tag 1')->firstOrFail();
        // $this->q->where('tage_title', 'Tag 1');
        // $r = $this->firstOrFail();
        $this->q->where('tag_title','Tag 2 - 10222');
        $r = $this->q->get()->toArray();
        // 
        // $r = $this->q
        //         ->where('tag_title', 'Tag 1')
        //         ->orWhere(function($q)
        //         {
        //             $this->q->where('id', '<', 12);
        //         })
        //         ->get()->toArray();

        // 

        // $this->q->orWhere('tag_title', 'Tag 3');

        // $this->setWhere(array('tag_title', 'Tag 2'))->get();

        // $r = $this->get();
        // $r = $this->q->onlyOwners()->get();



dump($r);
        // dump($r->toArray());
        return;







        // $this->q = $this->model;

        // $this->model->where('tag_title', 'Tag 1');
        
        // $r = $this->model->onlyOwners()->lists('tag_title', 'tag_description', 'created_at');
        // $r = $this->model->onlyOwners()->whereTagTitle('Tag 1')->get()->toArray();
        // $r = $this->findAll()->toArray();
        // // $r = $this->model->onlyOwners()->whereTagTitle('Tag 1')->get()->toArray();
        // // $r = $this->model->onlyOwners()->whereTagTitle('Tag 1')->get()->toArray();



        // // $r = $this->model->findAll();
        // // $r = $this->q->get();
        // // $r = $this->model->onlyOwners()->get();

        // dump($r, 1);

        // $this->setCols();
        // if ( $contact_id = Input::get('contact_id') ) $this->q->where('contact_id', $contact_id);
        // if ( $sortASC = Input::get('sortASC') ) $this->q->orderBy($sortASC, 'asc');
        // if ( $sortDESC = Input::get('sortDESC') ) $this->q->orderBy($sortDESC, 'desc');
        // // $this->q->where('');
        // return $this->getResult($dataTable);
    }

}