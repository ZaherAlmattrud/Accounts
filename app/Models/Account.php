<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;


      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accounts';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  [ 'title' ,'order' ,'debtor' ,'creditor' , 'parent_id' ] ;



    public function parent(){

       return $this->belongsTo(Account::class , 'parent_id');

    }

    public function children(){

      return $this->hasMany(Account::class , 'parent_id')->with('children');
      
   }

  
}
