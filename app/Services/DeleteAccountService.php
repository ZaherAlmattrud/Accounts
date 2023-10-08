<?php

namespace App\Services ;
use App\Repositories\AccountRepository ;

class DeleteAccountService  
{

    private $repo;

    function __construct(AccountRepository $repo){
     
        $this->repo = $repo ;

    }


    public function destroy($accountId){

        $this->repo->destroy($accountId);
    }

}