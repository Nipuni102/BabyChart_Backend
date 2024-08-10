<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Store a newly created child in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dateOfBirth' => 'required|date',
            'hearing' => 'nullable|string|max:255',
            'height' => 'nullable|numeric',
            'birthWeight' => 'nullable|numeric',
            'eyeSight' => 'nullable|string|max:255',
            'bloodGroup' => 'nullable|string|max:3',
            'bmi' => 'nullable|numeric',
            'childBirthRegNumber' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'user_id' => 'required|exists:users,id',
            'midWifeId' => 'required|exists:mid_wives,id',
            'qr_code' => 'nullable|file|mimes:png,jpg,jpeg',
        ]);

        // Map the validated data to the correct column names in the database
        $childData = [
            'name' => $validatedData['name'],
            'date_of_birth' => $validatedData['dateOfBirth'],
            'hearing' => $validatedData['hearing'],
            'height' => $validatedData['height'],
            'birth_weight' => $validatedData['birthWeight'],
            'eye_sight' => $validatedData['eyeSight'],
            'blood_group' => $validatedData['bloodGroup'],
            'bmi' => $validatedData['bmi'],
            'child_birth_registration_number' => $validatedData['childBirthRegNumber'],
            'weight' => $validatedData['weight'],
            'user_id' => $validatedData['user_id'],
            'mid_wife_id' => $validatedData['midWifeId'],
        ];

        if ($request->hasFile('qr_code')) {
            $file = $request->file('qr_code');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/qr_codes', $fileName);
            $childData['qr_code'] = $fileName; // Save filename to database
        } else {
            $childData['qr_code'] = null; // Ensure qr_code is null if no file is uploaded
        }

        // Create a new child using the validated data
        $child = Child::create($childData);

        // Return a JSON response with the created child data
        return response()->json([
            'success' => true,
            'message' => 'Child registered successfully.',
            'data' => $child,
        ], 201);
    }

}
