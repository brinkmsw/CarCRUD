<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CarController extends Controller
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response 
    {
        return Inertia::render('Cars/Index', [

            'cars' => Car::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'model' => 'required|string|max:100',
            'year' => 'required|int',
            'manufacturer' => 'required',
        ]);
 
        return redirect(route('cars.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:100',
            'year' => 'required|int',
            'manufacturer' => 'required',
        ]);

        return redirect(route('cars.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {        
        $car->delete();
 
        return redirect(route('cars.index'));
    }
}
