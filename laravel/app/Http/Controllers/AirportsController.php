<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $airports = Airports::all();
        $results =  DB::table('flights')
            ->join('airports', 'flights.airport_id2', '=', 'airports.id')
            ->join('aircrafts', 'flights.aircraft_id', '=', 'aircrafts.id')
            ->where('aircrafts.tail', '=', $request->tail)
            ->where('flights.takeoff', '>', $request->date_from)
            ->where('flights.landing', '<', $request->date_to)
            ->select('aircrafts.tail','airports.id','airports.code_iata','airports.code_icao','flights.cargo_load','flights.cargo_offload','flights.landing','flights.takeoff')
            ->get();
        return response()->json($results);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Airports $airports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airports $airports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airports $airports)
    {
        //
    }
}
