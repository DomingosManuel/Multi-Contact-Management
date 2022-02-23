<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ContactosRequest;
class ContactoController extends Controller
{
    

    public function  admin(){
        $users=User::all()->count();
        $contactos=Contacto::all()->count();
        $pessoas=Pessoa::all()->count();
        $lixo=Pessoa::onlyTrashed()->get()->count();
        $nome=auth()->user();
        return view('dashboard',['nome'=>$nome,'users'=>$users,'contactos'=>$contactos,'lixo'=>$lixo,'pessoas'=>$pessoas]);
    }


 

// CRUD DE CONTACTOS

public function add($id){
    $nome=auth()->user();
    $dono=Pessoa::findorFail($id);
    return view('adicionar',['nome'=>$nome,'dono'=>$dono]);
}

public function store(ContactosRequest $requst,$id){
  
    $user= auth()->user();
    $dono=Pessoa::findorFail($id);
   $contacto= new Contacto;
   $contacto->numero=$requst->numero;
   $contacto->cod=$requst->cod;
   $contacto->user_id=$user->id;
   $contacto->pessoa_id=$dono->id;
   $contacto->save();
    return redirect('/admin')->with('smg7','Inserido com Sucesso!');

}





public function destroy($id){

    $delete=Contacto::findorFail($id)->delete();

    return redirect('/admin')->with('smg8','Deletado com sucesso!');
}
    
   
public function upd($id){
            
    $edit=Contacto::findorFail($id);
    
        $nome=auth()->user();
        return view('admin.edit',['edit'=>$edit,'nome'=>$nome]);


}


       
public function update(ContactosRequest $request,$id){
           
    $edit=Contacto::findorFail($id)->update($request->all());

    return redirect('/admin')->with('smg9','Editado com Sucesso!');

}


     



       
  

      
}
