<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\SubserviceCategory;
use App\Models\RemodelType;
use App\Models\Requirement;  // Add the Requirement model
use Illuminate\Http\Request;

class ServiceFormController extends Controller
{
    public function index()
    {
        // Eager load the sub-services, remodel types, and their requirements
        $services = ServiceCategory::with('subServices.remodelTypes.requirements')->get();
        return view('admin.form.index', compact('services'));
    }

    public function create()
    {
        return view('admin.form.add');
    }
    

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'serviceName' => 'required|string|max:255',
                'sub_services' => 'required|array',
                'sub_services.*.name' => 'required|string|max:255',
                'sub_services.*.remodel_types' => 'required|array',
                'sub_services.*.remodel_types.*.name' => 'required|string|max:255',
                'sub_services.*.remodel_types.*.requirements' => 'nullable|array',
                'sub_services.*.remodel_types.*.requirements.*.name' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());  // This will show the validation errors
        }

        // Create service category
        $service = ServiceCategory::create(['name' => $request->serviceName]);

        if ($request->has('sub_services')) {
            foreach ($request->sub_services as $sub_service) {
                // Create Subservice
                $subService = $service->subServices()->create([
                    'name' => $sub_service['name'],
                    'service_category_id' => $service->id, // Ensure service_category_id is set
                ]);

                // Create Remodel Types for the Subservice
                if (isset($sub_service['remodel_types'])) {
                    foreach ($sub_service['remodel_types'] as $remodel) {
                        $remodelType = $subService->remodelTypes()->create(['name' => $remodel['name']]);

                        // Create requirements if they exist
                        if (isset($remodel['requirements'])) {
                            foreach ($remodel['requirements'] as $requirement) {
                                $remodelType->requirements()->create(['name' => $requirement['name']]);
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.form.index');
    }

    public function edit($id)
    {
        // Load the service with sub-services, remodel types, and their requirements
        $service = ServiceCategory::with('subServices.remodelTypes.requirements')->findOrFail($id);
        return view('admin.form.add', compact('service'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the request
            $request->validate([
                'serviceName' => 'required|string|max:255',
                'sub_services' => 'required|array',
                'sub_services.*.name' => 'required|string|max:255',
                'sub_services.*.remodel_types' => 'required|array',
                'sub_services.*.remodel_types.*.name' => 'required|string|max:255',
                'sub_services.*.remodel_types.*.requirements' => 'nullable|array',
                'sub_services.*.remodel_types.*.requirements.*.name' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());  // This will show the validation errors
        }

        // Find the service category and update
        $service = ServiceCategory::findOrFail($id);
        $service->update(['name' => $request->serviceName]);

        // Delete existing sub-services and remodel types
        $service->subServices->each(function ($subService) {
            $subService->remodelTypes->each(function ($remodel) {
                $remodel->requirements()->delete();  // Delete requirements related to remodel types
            });
            $subService->remodelTypes()->delete();  // Delete remodel types
        });

        // Add new sub-services and remodel types
        if ($request->has('sub_services')) {
            foreach ($request->sub_services as $sub_service) {
                $subService = $service->subServices()->create([
                    'name' => $sub_service['name'],
                    'service_category_id' => $service->id,  // Ensure service_category_id is set
                ]);

                if (isset($sub_service['remodel_types'])) {
                    foreach ($sub_service['remodel_types'] as $remodel) {
                        $remodelType = $subService->remodelTypes()->create(['name' => $remodel['name']]);

                        // Create requirements if they exist
                        if (isset($remodel['requirements'])) {
                            foreach ($remodel['requirements'] as $requirement) {
                                $remodelType->requirements()->create(['name' => $requirement['name']]);
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.form.index');
    }

    public function destroy($id)
    {
        $service = ServiceCategory::findOrFail($id);

        // Delete related sub-services and remodel types
        $service->subServices->each(function ($subService) {
            $subService->remodelTypes->each(function ($remodel) {
                $remodel->requirements()->delete();  // Delete requirements related to remodel types
            });
            $subService->remodelTypes()->delete();  // Delete remodel types
        });

        // Delete the service and its sub-services
        $service->delete();
        return redirect()->route('admin.form.index');
    }
}
