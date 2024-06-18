<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZapatoController;
use App\Models\Carrito;
use App\Models\Factura;
use App\Models\Linea;
use App\Models\Zapato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('zapatos.index', [
        'zapatos' => Zapato::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('facturas', FacturaController::class);
});

Route::resource('zapatos', ZapatoController::class);



Route::get('/carritos/ver', function () {
    return view('carritos.ver', [
        'usuario' => Auth::user(),
    ]);
 })->middleware('auth')->name('carritos.ver');

 Route::get('/carritos/create/{zapato}', function (Zapato $zapato) {
    return view('carritos.create', [
        'zapato' => $zapato,
    ]);
})->name('carritos.create');

Route::post('/carritos/store/{zapato}', function (Zapato $zapato, Request $request) {

    $carrito = Carrito::where("user_id", auth()->user()->id)
    ->where("zapato_id", $request->zapato_id)
    ->first();

    if (!$carrito) {
        $carrito = new Carrito();
        $carrito->user_id = Auth::user()->id;
        $carrito->zapato_id = $zapato->id;
        $carrito->cantidad = $request->cantidad;
        $carrito->save();

} else {
    $carrito->update([
    "cantidad" => $carrito->cantidad + $request->cantidad
]);
}
    return view('carritos.ver', [
        'usuario' => Auth::user(),
    ]);
 })->name('carritos.store');

 Route::delete('/carritos/destroy/{carrito}', function (Carrito $carrito) {
    $carrito->delete();
    return redirect()->route('carritos.ver');
 })->name('carritos.destroy');

 Route::post('/carritos/sumar/{carrito}', function (Carrito $carrito) {
    $carrito->cantidad += 1;
    $carrito->save();
    return redirect()->route('carritos.ver');
 })->name('carritos.sumar');

 Route::post('/carritos/restar/{carrito}', function (Carrito $carrito) {
    $carrito->cantidad -= 1;

    // Si la cantidad llega a 0, eliminar el ítem del carrito
    if ($carrito->cantidad <= 0) {
        $carrito->delete();
    } else {
        // Si la cantidad es mayor que 0, guardar los cambios
        $carrito->save();
    }
    return redirect()->route('carritos.ver');
 })->name('carritos.restar');


 Route::get('/carritos/vaciar', function () {
    $usuario = Auth::user();
    if ($usuario) {
        foreach ($usuario->carritos as $carrito) {
            $carrito->delete();
        }
    }
    return redirect()->route('carritos.ver');
 })->name('carritos.vaciar');

 Route::get('/carritos/comprar', function () {
    $carritos = Auth::user()->carritos;

    $factura = new Factura();
    $factura->usuario_id = Auth::user()->id;
    $factura->created_at = now();
    $factura->save();
    // $factura = Factura::create([
    //     "user_id" => auth()->user()->id,
    //     "created_at" => now(),
    // ]);
    foreach($carritos as $carrito){
        $linea = new Linea();
        $linea->factura_id = $factura->id;
        $linea->zapato_id = $carrito->zapato->id;
        $linea->cantidad = $carrito->cantidad;
        $linea->save();
        // Linea::create([
        //     "factura_id" => $factura->id,
        //     "zapato_id" => $carrito->zapato->id,
        //     "cantidad" => $carrito->cantidad
        // ]);
    }
    foreach($carritos as $carrito){
        $carrito->delete();
    }

    return redirect()->route('facturas.index');
 })->name('carritos.comprar');

require __DIR__.'/auth.php';
