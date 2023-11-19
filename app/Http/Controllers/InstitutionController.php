<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Remittance;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutions = Institution::get();
        return view('admin.institution.AdminInstitutionView', ['institutions' => $institutions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $remittances = Remittance::get();
        return view('admin.institution.CreateInstitution', ['remittances' => $remittances, 'institution' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|regex:/^^([A-Za-zÑñ\s]*)$/|between:3,2000',
            'rector' => 'required|regex:/^^([A-Za-zÑñ\s]*)$/|between:3,2000',
            'address' => 'required|regex:/^^([A-Za-zÑñ\s]*)$/|between:3,2000',
            'phone' => 'required|integer|between:3000000000,3999999999',
            'email' => 'required|string|email|max:255|min:8|unique:users',
        ]);

        Institution::create(
            [
                //'id' => $request->id,
                'name' => $request->name,
                'rector' => $request->rector,
                'zone' => $request->zone,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]
        );

        return redirect()->route('institution.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        // dd($institution);
        $remittances = Remittance::get();
        return view('admin.institution.EditInstitution', ['remittances' => $remittances, 'institution' => $institution]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institution $institution)
    {
        // dd($request);
        $request->validate([

            'name' => 'required|regex:/^^([A-Za-zÑñ\s]*)$/|between:3,2000',
            'rector' => 'required|regex:/^^([A-Za-zÑñ\s]*)$/|between:3,2000',
            'address' => 'required|regex:/^^([A-Za-zÑñ\s]*)$/|between:3,2000',
            'phone' => 'required|integer|between:3000000000,3999999999',
            'email' => 'required|string|email|max:255|min:8|unique:users',


        ]);

        $institution->update(
            [
                'name' => $request->name,
                'rector' => $request->rector,
                'zone' => $request->zone,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]
        );

        // dd($request);
        return redirect()->route('institution.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();
        return redirect()->route('institution.index');
    }
}
