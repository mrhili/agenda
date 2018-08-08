<?php

namespace App\Http\Controllers;

use App\Adress;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        return view('back.adresses.list');
    }

    public function data()
    {
        //
        return Datatables::of( Adress::all() )

        ->editColumn('nomcomplet', function( $model ){

            return $model->name . ' '. $model->last_name;

        })

        ->editColumn('modifier', function($model){
            return link_to('#', 'modifier', ['class' => 'btn btn-info btn-circle btn-update', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'id' => 'updt-'.$model->id ], null);
        })

        ->editColumn('suprimer', function($model){
            return link_to('#', 'suprimer', ['class' => 'btn btn-info btn-circle btn-delete', 'data-toggle'=>'modal', 'data-target'=>'#modal-default', 'data-id' => $model->id, 'id' => 'dlt-'.$model->id ], null);
        })

        ->make(true);
    }


    public function show(Adress $adress)
    {
        //
        return response()->json($adress->toArray());
    }

    public function store(Request $request)
    {
        //
        $array  = array_except($request->all(), ['_token', 'namefield']);

        $array['name'] = $request->namefield;
        $adress = Adress::create($array);
        return response()->json($adress->toArray());
    }
    
    public function update(Request $request, Adress $adress)
    {
        //
        $array  = array_except($request->all(), ['_token', 'namefield']);

        $array['name'] = $request->namefield;

        $adress->update( $array);
        
        return response()->json($adress->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adress  $adress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adress $adress)
    {
        //
        $true = $adress->delete();
        return response()->json($true);
    }
}
