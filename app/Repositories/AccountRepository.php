<?php

namespace App\Repositories ;
use App\Models\Account ;

class AccountRepository  
{


    private $model ;

    function __construct(Account $account){
     
        $this->model = $account ;

    }


    public function getById($id){

        return $this->model->where('id',$id)->first();

    }

    public function getAllTrees(){


        return $this->model->whereNull('parent_id')->with('children')->get();


    }

    public function getTree($id){


        return $this->model->where('id',$id)->with('children')->first();

    }

    public function store($data){

        return $this->model->create($data);
    }

    public function update($data , $id){

       $account =  $this->getById($id);
       if( $account )
         $account->update($data);

       return $account ;
    }

    public function destroy($id){

        try{

            DB::beginTransaction();
            $account = $this->getById($id) ;
            if ( $account ){
                $children = $account->children ;
                foreach ($children as $child)
                      $this->deleteChilds($child);
            $account->delete();
    
            }


        }catch(Exception $e){

            DB::rolback();
            return [ 'exception'=>$e->getMessage()] ;
        }

        DB::commit();
       

    }

    public function deleteChilds($child){
  
        foreach ($child->children  as $children)
          $this->deleteChilds($children);
        $child->delete();
    }

}