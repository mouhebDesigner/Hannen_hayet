<?php

namespace App\Http\Controllers\directeur;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChefRequest;

class ChefController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = User::where('grade', 'chef')->orderBy('created_at', 'desc')->paginate(10);

        return view('directeur.chefs.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directeur.chefs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChefRequest $request)
    {
        $chef = new User();
        $chef->name = $request->name;
        $chef->email = $request->email;
        $chef->password = Hash::make($request->password);
        $chef->numtel = $request->numtel;
        $chef->grade = "chef";
    //   $2y$10$.BnC5RqmfLsxdPSqm8za7eQuMlpDG85C.1ECV3okG32a6ZpAoxTvW

        $chef->save();

        

        return redirect('directeur/chefs')->with('added', 'Le chef a été ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chef = User::find($id);

        return view('directeur.chefs.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

        $chef =  User::find($id);

        $chef->name = $request->name;
        $chef->email = $request->email;
        $chef->password = Hash::make($request->password);
        $chef->numtel = $request->numtel;

        $chef->save();

            

        return redirect('directeur/chefs')->with('updated', 'Le chef a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('directeur/chefs')->with('deleted', 'Le chef a été supprimer avec succés');
        
    }
}
