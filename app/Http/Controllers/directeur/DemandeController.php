<?php

namespace App\Http\Controllers\directeur;

use Auth;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DemandeRequest;
use App\Notifications\RequestAccepted;


class DemandeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::paginate(10);

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

        return redirect('/demandes')->with('added', 'La demande a été ajouté avec succés');
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

        return redirect('demandes')->with('updated', 'La demande a été modifié avec succés');
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
        return redirect('demandes')->with('deleted', 'La demande a été supprimer avec succés');
        
    }

    public function accepter($demande_id)   {
        
        $demande = Demande::find($demande_id);

        $demande->etat = "accepter";

        $demande->save();

        User::find($demande->user_id)->notify(new RequestAccepted($demande));


        return redirect()->back()->with('success', 'La demande a été accepté avec succée');
    }
    public function refuser($demande_id)   {
        $demande = Demande::find($demande_id);

        $demande->etat = "refuser";

        $demande->save();

        return redirect()->back()->with('success', 'La demande a été refusé avec succée');
    }
    public function transferer($demande_id)   {

        $demande = Demande::find($demande_id);

        $demande->transferer = 1;

        $demande->save();

        return redirect()->back()->with('success', 'La demande a été transféré  avec succée');
    }
}
