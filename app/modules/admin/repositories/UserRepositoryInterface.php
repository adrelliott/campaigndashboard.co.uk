<?php namespace Dashboard\Repositories;

interface UserRepositoryInterface {
    
    public function findRecord($id);
        
    public function createRecord();
        
    public function updateRecord($id);

    public function destroyRecord($id);
}
