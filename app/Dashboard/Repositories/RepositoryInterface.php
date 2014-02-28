<?php namespace Dashboard\Repositories;

interface RepositoryInterface {
    
    public function findRecord($id);
        
    public function createRecord();
        
    public function updateRecord($id);
}
