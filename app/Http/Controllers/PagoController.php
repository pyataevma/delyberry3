<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'metodo_pago' => 'required|numeric|max:255',
            'monto' => 'required|numeric|min:0',
            'estado' => 'nullable|string|max:1000',
     ]);

         Pago::create([
            'metodo_pago' => $request->metodo_pago,
            'monto' => $request->monto,
            'estado' => $request->estado,
            ]);

        // Redirect back to the main page with a success message
        return redirect()->back()->with('success', 'Pago está agregado con exito!');
    }

    public function show(string $id)
    {
        $pago = Pago::findOrFail($id);
        return view('pagos.show', compact('pago'));
    }

    public function edit(string $id)
    {
        $pago = Pago::findOrFail($id);
        return view('pagos.edit', compact('pago'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'metodo_pago' => 'required|numeric|max:255',
            'monto' => 'required|numeric|min:0',
            'estado' => 'nullable|string|max:1000',
        ]);

        $pago = Pago::findOrFail($id);

        $pago->update([
            'metodo_pago' => $request->metodo_pago,
            'monto' => $request->monto,
            'estado' => $request->estado,
        ]);

        $pago->save();
        return redirect()->back()->with('success', 'Pago updated successfully!');
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->back()->with('success', 'Pago eleminado con exito!');
    }

}
