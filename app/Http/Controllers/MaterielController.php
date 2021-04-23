<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
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

        return view('materiels.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materiels.create');
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
        $materiel->categorie_id = $request->categorie_id;

        $materiel->save();

        return redirect('/materiels')->with('added', 'Le materiel a été ajouté avec succés');
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

        return view('materiels.edit', compact('categorie'));
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
        $materiel->categorie_id = $request->categorie_id;
        $materiel->save();

        return redirect('materiels')->with('updated', 'Le matériel a été modifié avec succés');
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
        return redirect('materiels')->with('deleted', 'Le matériel a été supprimer avec succés');
        
    }
}
