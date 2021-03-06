<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Reception;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reception::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'unique_id' => 'required|String|max:191|unique:receptions',
            'patient_name' => 'required|String|max:191',
            'patient_email' => 'required|String|email|max:191|unique:receptions',
            'symptoms' => 'required|String|max:191',
        ]);

        return Reception::create([
            'unique_id' => $request['unique_id'],
            'patient_name' => $request['patient_name'],
            'patient_email' => $request['patient_email'],
            'symptoms' => $request['symptoms'],
        ]);
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
        $reception = Reception::findOrFail($id);
        $reception->delete();
    }
}
