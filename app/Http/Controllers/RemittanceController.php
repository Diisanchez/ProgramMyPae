<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Remittance;
use Illuminate\Http\Request;

class RemittanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $remittances = Remittance::get();
        return view('admin.remittance.AdminRemittanceView', ['remittances' => $remittances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institutions = Institution::get();
        return view('admin.remittance.CreateRemittance', ['institutions' => $institutions, 'remittance' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'description' => 'required|regex:/^^([A-Za-zÑñ,\s]*)$/|between:3,2000',
            'stock' => 'required|integer|between:1,9',
            'numberStudent' => 'required|integer|between:50,1500',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/remittances/'), $imageName);

        Remittance::create(
            [
                'description' => $request->description,
                'institution_id' => $request->institution_id,
                'stock' => $request->stock,
                'numberStudent' => $request->numberStudent,
                'image' => $imageName
            ]
        );

        return redirect()->route('remittance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $institutions = Institution::get();
        $remittance = Remittance::find($id);
        // dd($remittance);

        return view('admin.remittance.VisualiceRemittance', ['institutions' => $institutions, 'remittance' => $remittance]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Remittance $remittance)
    {
        $institutions = Institution::get();
        return view('admin.remittance.EditRemittance', ['institutions' => $institutions, 'remittance' => $remittance]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Remittance $remittance)
    {
         // dd($request);
        $request->validate([
            'description' => 'required|regex:/^^([A-Za-zÑñ,\s]*)$/|between:3,2000',
            'stock' => 'required|integer|between:1,9',
            'numberStudent' => 'required|integer|between:50,1500',

        ]);

        $remittance->update(
            [
                'description' => $request->description,
                'institution_id' => $request->institution_id,
                'stock' => $request->stock,
                'numberStudent' => $request->numberStudent,
                'image' => ''
            ]
        );

        // dd($request);
        return redirect()->route('remittance.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Remittance $remittance)
    {
        $remittance->delete();
        return redirect()->route('remittance.index');
    }


    public function delivery(Request $request, Remittance $remittance)
    {
        // Decrementar el stock de la remesa
        $remittance->update([
            'stock' => $remittance->stock - 1,
        ]);

        // Guardar la información actualizada en la base de datos
        $remittance->save();

        $institutions = Institution::get();
        return view('admin.remittance.DeliveryRemittance', ['institutions' => $institutions, 'remittance' => $remittance]);
    }

}
