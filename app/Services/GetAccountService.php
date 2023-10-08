<?php

namespace App\Services ;
use App\Repositories\AccountRepository ;

class GetAccountService  
{


    private $repo;

    function __construct(AccountRepository $repo){
     
        $this->repo = $repo ;

    }

    public function getAll(){

        return $this->repo->getAllTrees();
    }

    public function getTree($id){

        return $this->repo->getTree($id);
    }

}