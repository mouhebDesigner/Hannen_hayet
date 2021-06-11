<?php

namespace App\Http\Controllers\Responsable;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = Demande::where('transferer', 1)->paginate(10);

        return view('demandes.index', compact('demandes'));
    }

    public function accepter($demande_id)   {
        $demande = Demande::find($demande_id);

        $demande->etat = "accepter";

        $demande->save();

        return redirect()->back()->with('success', 'La demande a été accepté avec succée');
    }
    public function refuser($demande_id)   {
        $demande = Demande::find($demande_id);

        $demande->etat = "refuser";

        $demande->save();

        return redirect()->back()->with('success', 'La demande a été refusé avec succée');
    }
}
