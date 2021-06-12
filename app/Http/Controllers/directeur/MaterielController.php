<?php

namespace App\Http\Controllers\directeur;

use App\Models\Materiel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterielRequest;


class MaterielController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiels = Materiel::paginate(10);

        return view('directeur.materiels.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directeur.materiels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaterielRequest $request)
    {
        $materiel = new Materiel();

        $materiel->nom = $request->nom;
        $materiel->quantite = $request->quantite;
        $materiel->categorie = $request->categorie;

        $materiel->save();

        return redirect('directeur/materiels')->with('added', 'Le materiel a été ajouté avec succés');
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
        $materiel = Materiel::find($id);

        return view('directeur.materiels.edit', compact('materiel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaterielRequest $request, $id)
    {
        $materiel =  Materiel::find($id);

        $materiel->nom = $request->nom;
        $materiel->quantite = $request->quantite;
        $materiel->categorie = $request->categorie;

        $materiel->save();

        return redirect('directeur/materiels')->with('updated', 'Le fourniture a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Materiel::find($id)->delete();
        return redirect('directeur/materiels')->with('deleted', 'Le fourniture a été supprimer avec succés');
        
    }
}

