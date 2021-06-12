<?php

namespace App\Http\Controllers\directeur;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChefRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TechnicienRequest;

class TechnicienController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * afficher la liste de chef directeur/techniciens
     * 
     */
     
    public function index()
    {
        $techniciens = User::where('grade', 'technicien')->orderBy('created_at', 'desc')->paginate(10);

        return view('directeur.techniciens.index', compact('techniciens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * La fonction de path directeur/techniciens/create
     * La formulaire d'ajout chef
     */
    
    public function create()
    {
        return view('directeur.techniciens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Ajouter un chef à la base de donnés
     */
    // La fonction de path directeur/techniciens
    public function store(TechnicienRequest $request)
    {
        $technicien = new User();
        $technicien->name = $request->name;
        $technicien->email = $request->email;
        $technicien->password = Hash::make($request->password);
        $technicien->numtel = $request->numtel;
        $technicien->specialite = $request->specialite;
        $technicien->grade = "technicien";
        
        $technicien->save();

        

        return redirect('directeur/techniciens')->with('added', 'Le technicien a été ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Afficher la formulaire d'edition de chef
     * directeur/techniciens/{id}/edit
     * method get 
     */
    public function edit($id)
    {
        $technicien = User::find($id);

        return view('directeur.techniciens.edit', compact('technicien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * 
     * mise à jour de chef 
     * directeur/techniciens/{id} 
     * method put 
     */
    public function update(Request $request, $id)
    {

        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".$id.",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$id.",id",
            'name' => 'required | string | max:255',
        ]);

        $technicien =  User::find($id);

        $technicien->name = $request->name;
        $technicien->email = $request->email;
        $technicien->password = Hash::make($request->password);
        $technicien->numtel = $request->numtel;
        $technicien->specialite = $request->specialite;


        $technicien->save();

            

        return redirect('directeur/techniciens')->with('updated', 'Le technicien a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Supprimer un chef 
     * directeur/techniciens/{id}
     * method delete 
     * 
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('directeur/techniciens')->with('deleted', 'Le technicien a été supprimer avec succés');
        
    }
}
