<?php

namespace App\Models;
use App\Models\Contacto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{ 
    use HasFactory,SoftDeletes;
    
    protected $dates = ['deleted_at'];

  protected $table='pessoas';
  public $timestamps= false;
   
  protected $casts=[
      'items'=> 'array'
  ];

  protected $guarded=[];

    use HasFactory;


//relacionamentos
    public function contactos(){
       
        return $this->hasMany(Contacto::class);
    }


    
}
