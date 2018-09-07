<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Wage;

class statController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wage = Wage::all();       
        $avg = Wage::avg('tip');
        $maxtip = Wage::max('tip');
        $mintip = Wage::min('tip');       
        $count = Wage::count('tip');
        $total = Wage::sum('tip');
        //calc stddev
        $variance = 0.00;
        foreach($wage as $i)
        {
            // sum of squares of differences between 
                        // all numbers and means.
            $variance += pow(($i['tip'] - $avg), 2);
        }
        
         $std = (float)sqrt($variance/$count);
        return view("/Stats/Stats", [
            "wage"=>$wage, 
            "tipavg"=>$avg,
            "tipmax"=>$maxtip,
            "tipmin"=>$mintip,
             "std"=>$std,
            "total"=>$total]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Stats/AddWage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        
        $w = Wage::create([
        'date' => request('date'),
        'tip' => request('tip'),
        'employer' => request('employer'),
        'rate' => request('wage'),
        'hours' => request('hours'),
]);
        
        $w->save();
        
         
      
        
       
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
