<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function handleRequest(Request $request)
    {
        // 1. Validate the request data
        $validated = $this->validateData($request);

        // 2. Clean the services data
        $cleanedServices = $this->cleanServicesData($validated['services']);

        // 3. Save the data into the database
        $this->saveData($validated, $cleanedServices);

        // Optionally, return a success response
        return redirect()->back()->with('success', 'Data saved successfully');
    }

    // 1. Validate the input data
    private function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string|max:500',
            'services' => 'required|array', // Validate services as an array
        ]);
    }

    // 2. Clean up the services array
    private function cleanServicesData($services)
    {
        return array_map(function ($service) {
            return preg_replace('/\s+/', ' ', trim($service));
        }, $services);
    }

    // 3. Save the data in the database
    private function saveData($validated, $cleanedServices)
    {
        Order::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'services' => json_encode($cleanedServices), // Store as JSON
        ]);
    }
}
