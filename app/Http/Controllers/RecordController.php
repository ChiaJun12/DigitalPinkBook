<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Records;
use App\Models\User;
use App\Models\Baby;
use App\Models\Vaccines;
use Illuminate\Support\Facades\Schema;
use DB;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Records::all();
    }

    // return all data in babies table together with records table
    public function alldata()
    {
        return DB::table('records')
        ->join('vaccines', 'records.id', '=', 'vaccines.id')
        ->select('records.id', 'records.bc', 'records.check_date', 'records.age', 'records.weight', 'records.body_length', 'records.head_circumference', 'records.tindak_balas', 'records.jaundice', 
        'vaccines.BCG', 'vaccines.Hepatitis_B(dos1)', 'vaccines.Hepatitis_B(dos2)', 'vaccines.DTaP/DT(dos1)', 'vaccines.Hib(dos1)', 'vaccines.IPV(dos1)', 'vaccines.DTaP/DT(dos2)', 'vaccines.Hib(dos2)', 'vaccines.IPV(dos2)', 'vaccines.DTaP/DT(dos3)', 'vaccines.Hib(dos3)', 'vaccines.IPV(dos3)', 'vaccines.Hepatitis_B(dos3)', 'vaccines.Measles(Sabah)', 'vaccines.JE(dos1)_Sarawak', 'vaccines.JE(dos2)_Sarawak', 'vaccines.MMR', 'vaccines.DTaP/DT(booster)', 'vaccines.IPV(booster)', 'vaccines.Hib(booster)', 'vaccines.JE(dos3)_Sarawak')
        ->get();
    }

    // return all babies records
    public function allbc()
    {
        return Baby::all();
    }

    // return babies records regarding the user input bc number
    public function searchdata(Request $request)
    {
        return DB::table('babies')->join('records', 'babies.bc', '=', 'records.bc')
        ->where('babies.bc', '=', $request->bc)
        ->get();
    }

    // return all the column name in vaccines table
    public function get_vaccines(){
        return Vaccines::all();
    }

    // create new records in vaccines table
    public function new_vaccination(Request $request){
        $vaccine = Vaccines::create($request->all());

        return response()->json($vaccine);

        // $vaccine = Vaccines::create($request->all());

        // return response()->json($vaccine);
    }

    // create new baby profile
    public function new_baby(Request $request){
        $baby = Baby::create($request->all());

        return response()->json($baby);
    }

    public function new_records(Request $request){
        $record = Records::create($request->all());
        return response()->json($record);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $record = Records::create($request->all());
        return response()->json($record);
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
