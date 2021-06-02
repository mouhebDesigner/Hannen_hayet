<?php

namespace App\Http\Controllers\Chef;

use Auth;
use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\IncidentRequest;

class IncidentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::where('user_id', Auth::user()->id)->paginate(10);

        return view('incidents.index', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incidents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
    {
        $incident = new Incident();

        $incident->titre = $request->titre;
        $incident->description = $request->description;
        $incident->user_id = Auth::user()->id;

        $incident->save();

        return redirect('chef/incidents')->with('added', 'L\'incident a été ajouté avec succés');
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
        $incident = Incident::find($id);

        return view('incidents.edit', compact('incident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncidentRequest $request, $id)
    {
        $incident =  Incident::find($id);
        $incident->description = $request->description;
        $incident->titre = $request->titre;

        $incident->save();

        return redirect('chef/incidents')->with('updated', 'L\'incident a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Incident::find($id)->delete();
        return redirect('chef/incidents')->with('deleted', 'L\'incident a été supprimer avec succés');
        
    }
}
