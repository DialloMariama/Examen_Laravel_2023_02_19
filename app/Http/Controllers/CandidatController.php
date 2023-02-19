<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidats = Candidat::all();
        return view('candidat.index', ['candidats' => $candidats]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = Formation::all();
        return view('candidat/ajout',['formations'=>$formations]);
        //
    }
    public function rules()
    {
        return [
            'nomCandidat' => 'required',
            'prenomCandidat' => 'required',
            'email' => 'required|email',
            'age' => 'required',
            'niveauEtude' => 'required',
            'sexe' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nomCandidat.required' => 'Le champ nom est obligatoire',
            'prenomCandidat.required' => 'Ce champ est obligatoire',
            'email.required' => 'Ce champ est obligatoire',
            'niveauEtude.required' => 'Ce champ est obligatoire',
            'sexe.required' => 'Ce champ est obligatoire', 
        ];
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
        $candidat=Candidat::create($input);
        $candidat->formations()->attach($request->formations);
        return redirect('candidat/create')->with('flash_message','Candidat créé');
        //
    }
    public function candidatStats()
    {
        $totalCandidats = Candidat::count();
        $maleCandidats = Candidat::where('sexe', 'Masculin')->count();
        $femaleCandidats = Candidat::where('sexe', 'Feminin')->count();
        return view('candidat/candidatStats', [
            'totalCandidats' => $totalCandidats,
            'maleCandidats' => $maleCandidats,
            'femaleCandidats' => $femaleCandidats,
           

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function nbre()
    {
        $candidats_par_formation = Formation::withCount('candidats')->get();
        return view('candidat/nbreCandidatParFormation',compact('candidats_par_formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function showAgeDiagram()
    {
        $candidats = Candidat::all();

        $age_15_19 = $candidats->whereBetween('age', [15, 19])->count();
        $age_20_24 = $candidats->whereBetween('age', [20, 24])->count();
        $age_25_29 = $candidats->whereBetween('age', [25, 29])->count();
        $age_30_34 = $candidats->whereBetween('age', [30, 34])->count();
        $age_35 = $candidats->where('age', '==', 35)->count();

        return view('candidat/diagrammeAge', compact('age_15_19', 'age_20_24', 'age_25_29', 'age_30_34', 'age_35'));
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
