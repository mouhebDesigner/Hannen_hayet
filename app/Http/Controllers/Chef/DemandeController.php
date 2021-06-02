<?php

namespace App\Http\Controllers\Chef;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class DemandeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::where('user_id', Auth::user()->id)->paginate(10);

        return view('demandes.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demandes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemandeRequest $request)
    {
        $demande = new Demande();

        $demande->description = $request->description;
        $demande->date = $request->date;
        $demande->quantite = $request->quantite;
        $demande->materiel_id = $request->materiel_id;
        $demande->user_id = Auth::user()->id;

        $demande->save();

        return redirect('chef/demandes')->with('added', 'La demande a été ajouté avec succés');
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
        $demande = Demande::find($id);

        return view('demandes.edit', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DemandeRequest $request, $id)
    {
        $demande =  Demande::find($id);
        $demande->description = $request->description;
        $demande->date = $request->date;
        $demande->quantite = $request->quantite;
        $demande->materiel_id = $request->materiel_id;
        $demande->user_id = Auth::user()->id;

        $demande->save();

        return redirect('chef/demandes')->with('updated', 'La demande a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Demande::find($id)->delete();
        return redirect('chef/demandes')->with('deleted', 'La demande a été supprimer avec succés');
        
    }
}
