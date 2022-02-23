<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\User;
use App\Models\Pessoa;
use App\Http\Requests\PessoasRequest;

class PessoasController extends Controller
{
    public function index(){

        $search=request('sarch');

        if($search){
          
            $todos=Pessoa::where([
                ['nome','like','%'.$search.'%']
            ])->get();
        }else{
            $todos=Pessoa::all();
            $pessoas=Pessoa::all()->count();
        }

      
      
        return view('index',['todos'=>$todos]);
    }

    public function visu($id){
        
        $meu=Pessoa::findorFail($id);
        $contactos=$meu->contactos;
        return view('admin.single1',['meu'=>$meu,'contactos'=>$contactos]);
    }

    public function add(){
        $nome=auth()->user();
        return view('admin.addpessoa',['nome'=>$nome]);
    }


    public function store(PessoasRequest $request){
  
     $user= auth()->user();
       $pessoa= new Pessoa;
       $pessoa->nome=$request->nome;
       $pessoa->identidade=$request->identidade;
       $pessoa->email=$request->email;
       $pessoa->save();
        return redirect('/admin/addpessoa')->with('smg6','Inserido com Sucesso!');
    
    }



    public function meus(){
        $nome=auth()->user();
        $pessoas=Pessoa::all();

        return view('admin.meus',['nome'=>$nome,'pessoas'=>$pessoas]);
    }


    public function ver($id){
        $nome=auth()->user();
        
        $meu=Pessoa::findorFail($id);
        $contactos=$meu->contactos;
            return view('single2',['meu'=>$meu,'nome'=>$nome,'contactos'=>$contactos]);
   
    }

    public function destroy($id){

        $delete=Pessoa::findorFail($id)->delete();

        return redirect('/admin')->with('smg1','Deletado com sucesso!');
    }



      public function todos(){
            $nome=auth()->user();
            $todos=Pessoa::onlyTrashed()->get();
            return view('admin.todos',[ 'todos'=>$todos,'nome'=>$nome]);
          }

          
        public function retaurar($id){

           
            $delete=Pessoa::onlyTrashed()->findorFail($id)->restore();

            return redirect('/admin/contactos')->with('smg4','Resturado com sucesso!');
        }


        public function eliminar($id){

           
            $delete=Pessoa::onlyTrashed()->findorFail($id)->forceDelete();

            return redirect('/admin/contactos')->with('smg5','Eliminado permanentemente com sucesso!');
        }

        public function update(PessoasRequest $request,$id){
           
            $edit=Pessoa::findorFail($id)->update($request->all());

            return redirect('/admin')->with('smg3','Editado com Sucesso!');

        }


        public function upd($id){
            
            $edit=Pessoa::findorFail($id);
            
                $nome=auth()->user();
                return view('admin.editar',['edit'=>$edit,'nome'=>$nome]);
        

                return redirect('/admin');
          
           

        }

}
