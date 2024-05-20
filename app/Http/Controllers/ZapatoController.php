<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZapatoRequest;
use App\Http\Requests\UpdateZapatoRequest;
use App\Models\Zapato;
use Illuminate\Http\Request;

class ZapatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
   {
       return view('zapatos.index', [
           'zapatos' => Zapato::all(),
       ]);
   }


   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('zapatos.create');
   }
/* Opcional
  public function create()
  {
   return view('ordenadores.create', [
       'aulas' => Aula::all(),
   ]);
  }

 */
   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $validated = $request->validate([
           'codigo' => 'required|max:13',
           'denominacion' => 'required|max:255',
           'precio' => 'required',
       ]);


       $zapato = new Zapato();
       $zapato->codigo = $validated['codigo'];
       $zapato->denominacion = $validated['denominacion'];
       $zapato->precio = $validated['precio'];
       $zapato->save();
       session()->flash('success', 'El zapato se ha creado correctamente.');
       return redirect()->route('zapatos.index');
   }


   /**
    * Display the specified resource.
    */
   public function show(Zapato $zapato)
   {
       //
   }


   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Zapato $zapato)
   {
       return view('zapatos.edit', [
           'zapato' => $zapato,
       ]);
   }


   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Zapato $zapato)
   {
       $validated = $request->validate([
           'nombre' => 'required|max:255',
       ]);


       $zapato->nombre = $validated['nombre'];
       $zapato->save();
       session()->flash('success', 'El zapato se ha editado correctamente.');
       return redirect()->route('zapatos.index');
   }


   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Zapato $zapato)
   {
       $zapato->delete();
       return redirect()->route('zapatos.index');
   }
}
