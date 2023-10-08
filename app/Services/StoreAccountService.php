<?php

namespace App\Services ;
use App\Repositories\AccountRepository ;

class StoreAccountService  
{

    private $repo;

    function __construct(AccountRepository $repo){
     
        $this->repo = $repo ;

    }

    public function store($data){

      return  $this->repo->store($data);
    }

};