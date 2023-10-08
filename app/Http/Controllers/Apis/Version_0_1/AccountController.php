<?php

namespace App\Http\Controllers\Apis\Version_0_1;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Controllers\Controller ;
use App\Services\GetAccountService;
use App\Services\StoreAccountService;
use App\Services\UpdateAccountService;
use App\Services\DeleteAccountService;

class AccountController extends Controller
{



    private $getAccountService ;
    private $storeAccountService ;
    private $updateAccountService ;
    private $deleteAccountService ;


   function __construct(GetAccountService $getAccountService , StoreAccountService $storeAccountService ,UpdateAccountService $updateAccountService ,DeleteAccountService $deleteAccountService ){

        
        $this->getAccountService  = $getAccountService  ;
        $this->storeAccountService  = $storeAccountService   ;
        $this->updateAccountService  = $updateAccountService   ;
        $this->deleteAccountService   = $deleteAccountService  ;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

 
        $data = $this->getAccountService->getAll();

        return $this->response(true ,200 , 'success' , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        //

        $data =   $this->storeAccountService->store($request->all());
        return $this->response(true ,200 , 'success' , $data);
    }

    /**
     * Display the specified resource.
     */
    public function show($accountId)
    {
        //
        $data =   $this->getAccountService->getTree($accountId);
        return $this->response(true ,200 , 'success' , $data);
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, $accountId)
    {
        $data =   $this->updateAccountService->update($request->all() ,$accountId);
        return $this->response(true ,200 , 'success' , $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  $accountId)
    {
         $this->deleteAccountService->destroy($accountId);
        return $this->response(true ,200 , 'success' , []);
    }
}
