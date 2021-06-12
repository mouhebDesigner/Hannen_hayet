<?php

namespace App\Http\Controllers\directeur;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChefRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\employeRequest;

class EmployeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * afficher la liste de employe directeur/employes
     * 
     */
     
    public function index()
    {
        $employes = User::where('grade', 'employe')->orderBy('created_at', 'desc')->paginate(10);

        return view('directeur.employes.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * La fonction de path directeur/employes/create
     * La formulaire d'ajout employe
     */
    
    public function create()
    {
        return view('directeur.employes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Ajouter un employe à la base de donnés
     */
    // La fonction de path directeur/employes
    public function store(ChefRequest $request)
    {
        $employe = new User();
        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->password = Hash::make($request->password);
        $employe->numtel = $request->numtel;
        $employe->grade = "employe";
    //   $2y$10$.BnC5RqmfLsxdPSqm8za7eQuMlpDG85C.1ECV3okG32a6ZpAoxTvW

        $employe->save();

        

        return redirect('chef/employes')->with('added', 'l\'employé a été ajouté avec succés');
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
     * Afficher la formulaire d'edition de employe
     * directeur/employes/{id}/edit
     * method get 
     */
    public function edit($id)
    {
        $employe = User::find($id);

        return view('directeur.employes.edit', compact('employe'));
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
     * mise à jour de employe 
     * directeur/employes/{id} 
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


        $employe =  User::find($id);

        $employe->name = $request->name;
        $employe->email = $request->email;
        $employe->password = Hash::make($request->password);
        $employe->numtel = $request->numtel;

        $employe->save();

        return redirect('chef/employes')->with('updated', 'l\'employé a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Supprimer un employe 
     * directeur/employes/{id}
     * method delete 
     * 
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('chef/employes')->with('deleted', 'l\'employé a été supprimer avec succés');
        
    }
}
