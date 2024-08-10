<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;

class VaccineController extends Controller
{
    /**
     * Store a newly created vaccine in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'vaccinated_date' => 'required|date',
            'batch_no' => 'required|string|max:255',
            'adverse_effects' => 'nullable|string|max:255',
            'age_to_be_vaccinated' => 'required|date',
            'child_id' => 'required|exists:children,id',
        ]);

        // Create a new vaccine record
        $vaccine = Vaccine::create($validatedData);

        // Return a response, e.g., a success message or the newly created record
        return response()->json([
            'message' => 'Vaccine successfully created',
            'vaccine' => $vaccine
        ], 201);
    }
}
