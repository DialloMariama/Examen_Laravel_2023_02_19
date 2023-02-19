<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Referentiel;
use Illuminate\Http\Request;
use App\Http\Requests\FormationRequest;
use App\Models\Type;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        return view('formation.indexFormation', ['formations' => $formations]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $formation = formation::all();
        $referentiel = referentiel::all() ;
        return view('formation/ajoutFormation',compact('referentiel')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages());
        $input = $request->all();
        $f = new Formation();
        $f->nomForma = $request->nomForma;
        $f->duree = $request->duree;
        $f->description = $request->description;
        $f->isStarted = $request->isStarted;
        $f->dateDebut = $request->dateDebut;
        $f->referentiel_id = $request->referentiel;
        $f->save();

        return redirect('formation/create')->with('flash_message','Formation créé');
        //
    }
    public function rules()
    {
        return [
            'nomForma' => 'required|min:2',
            'duree' => 'required',
            'description' => 'required|min:5',
            'isStarted' => 'required|min:1',
            'dateDebut' => 'required',
            'dateDebut' => 'required|date|after:yesterday',

        ];
    }
    public function messages()
    {
        return [
            'nomForma.required' => 'Le champ nom est obligatoire',
            'duree.required' => 'Le champ durée est obligatoire',
            'description.required' => 'Le champ déscription est obligatoire',
            'isStarted.required' => 'Le champ isStarted est obligatoire',
            'dateDebut.required' => 'Le champ date est invalide', 

        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formaReferentiel()
    {
        $formations_par_referentiel = Referentiel::withCount('formations')->get();
        return view('formation/nbreFormationParReferentiel',compact('formations_par_referentiel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formationType()
    {
        $types = Type::with('referentiels')->get();
        return view('formation/formationParType',compact('types'));
    }
    public function showFormationStatus()
    {
        $formations = Formation::all();

        $inProgress = $formations->where('isStarted', 'Oui')->count();
        $pending = $formations->where('isStarted', 'Non')->count();

        return view('formation/diagrammeFormation', compact('inProgress', 'pending'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
