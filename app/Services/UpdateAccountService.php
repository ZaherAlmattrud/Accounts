<?php

namespace App\Services ;
use App\Repositories\AccountRepository ;

class UpdateAccountService  
{

    private $repo;

    function __construct(AccountRepository $repo){
     
        $this->repo = $repo ;

    }

    public function update($data ,$accountId){

       return  $this->repo->update($data ,$accountId);
    }

}