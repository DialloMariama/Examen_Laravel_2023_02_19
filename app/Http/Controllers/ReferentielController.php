<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Referentiel;
use App\Models\Type;
use Illuminate\Http\Request;

class ReferentielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referentiels = Referentiel::all();
        /* foreach ($referentiels as $key => $ref) {            
            $type = Type::find($ref->type_id);
            $ref->libelleType = $type->libelleType; 
        } */
        return view('referentiel.indexReferentiel', ['referentiels' => $referentiels]);
        //
    }
    public function rules()
    {
        return [
            'libelleRef' => 'required',
            'validated' => 'required',
            'horaire' => 'required',
            'type' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'libelleRef.required' => 'Le champ libellé est obligatoire',
            'validated.required' => 'Le champ validated est obligatoire',
            'horaire.required' => 'Le champ horaire est obligatoire',
            'type.required' => 'Le champ type est obligatoire',
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referentiel = referentiel::all() ;
        $formations = Formation::all();
        $type = Type::all() ;
        return view('referentiel/ajoutReferentiel',['formations'=>$formations,'type'=>$type]);

        //
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
        $r = new Referentiel();
        $r->libelleRef = $request->libelleRef;
        $r->validated = $request->validated;
        $r->horaire = $request->horaire;
        $r->type_id = $request->type;
        $r->save();
        return redirect('referentiel/create')->with('flash_message','Referentiel créé');
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
        //
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
