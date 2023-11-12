<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ManufacturerController extends Controller
{
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response 
    {
        return Inertia::render('Manufacturers/Index', [
            'manufacturers' => Manufacturer::latest()->get(),
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
            'name' => 'required|string|max:255',
        ]);

        $request->user()->manufacturers()->create($validated);
 
        return redirect(route('manufacturers.index'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
        ]);
 
        return redirect(route('manufacturers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
 
        return redirect(route('manufacturers.index'));
    }
}
