<?php namespace Dashboard\Repositories;

interface ContactRepositoryInterface {

    public function getAll();
    
    public function findRecord($id);
        
    public function createRecord();
        
    public function updateRecord($id);
}
