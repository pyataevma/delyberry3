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
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string|max:1000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('pagos', 'public'); // Save to storage/app/public/products
        }

        Pago::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $imagePath, // Save the image path
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
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripction' => 'nullable|string|max:1000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pago = Pago::findOrFail($id);

        if ($request->hasFile('imagen')) {
            if ($pago->imagen && Storage::disk('public')->exists($pago->imagen)) {
                Storage::disk('public')->delete($pago->imagen);
            }

            $imagePath = $request->file('imagen')->store('pagos', 'public');
            $pago->imagen = $imagePath;
        }

        $pago->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);

        $pago->save();
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->back()->with('success', 'Pago eleminado con exito!');
    }

}
