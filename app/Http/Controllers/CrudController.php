<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function offre()
    {
        return Offre::select('name','id')->get();
    }


   


    public function create()
    {
        return view('offres.create');
    }

    public function store(Request $request)
    {

        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validate = Validator::make($request->all(),$rules,$messages);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate);
        }

        Offre::create([
           'name'=>$request->name,
           'price'=>$request->price,
           'details'=>$request->details,
       ]);

       return redirect()->back()->with(['success'=>'bravo']);
       
    }
    protected function getMessages()
    {
        return  $messages = [
            'name.unique'=>'faut n',
            'price.numeric'=>'faut p',
            'details.required'=>'faut d',
        ];
        
    }
    protected function getRules()
    {
        return   $rules = [
            'name'=>'required|max:100|unique:offres,name',
            'price'=>'required|numeric',
            'details'=>'required',
        ];
        
    }

   
}
