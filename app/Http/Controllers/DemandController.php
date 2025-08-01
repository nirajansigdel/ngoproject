<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DemandController extends Controller
{
    public function index()
    {
        $page_title = 'Demands';

        $demands = Demand::with('country')
            ->latest()
            ->paginate(15);

        return view('backend.demand.index', compact('demands', 'page_title'));
    }

    public function create()
    {
        $countries = Country::all();
        $relatedDemands = collect(); // empty collection
        return view('backend.demand.create', compact('countries', 'relatedDemands'));
    }

    public function fetchRelated(Request $request)
    {
        $types = $request->input('types', []);

        $relatedDemands = Demand::whereIn('type', $types)
            ->active()
            ->latest()
            ->get();

        $html = view('backend.demand.partials.related', compact('relatedDemands'))->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [];

            if ($request->has('country_id')) {
                $rules['country_id'] = 'required|exists:countries,id';
            }

            $rules['content'] = 'required|string';
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';

            if ($request->has('heading')) {
                $rules['heading'] = 'nullable|string|max:255';
            }
            if ($request->has('subtitle')) {
                $rules['subtitle'] = 'nullable|string|max:255';
            }
            if ($request->has('from_date')) {
                $rules['from_date'] = 'nullable|date';
            }
            if ($request->has('to_date')) {
                $rules['to_date'] = 'nullable|date|after_or_equal:from_date';
            }
            if ($request->has('vacancy')) {
                $rules['vacancy'] = 'nullable|string|max:255';
            }
            if ($request->has('number_of_people_required')) {
                $rules['number_of_people_required'] = 'nullable|string|max:255';
            }
            if ($request->has('demand_types')) {
                $rules['demand_types'] = 'nullable|array';
            }

            $request->validate($rules);

            if ($request->hasFile('image')) {
                $imageSize = $request->file('image')->getSize() / 1024;
                if ($imageSize > 2048) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Error! Image size cannot exceed 2 MB. Your image is ' . number_format($imageSize, 2) . ' KB.');
                }
            }

            $newImageName = null;
            if ($request->hasFile('image')) {
                $newImageName = time() . '-' . $request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/demands'), $newImageName);
            } else {
                return redirect()->back()->withInput()->with('error', 'No image uploaded. Please upload an image.');
            }

            $demand = new Demand();

            $demand->content = $request->content;
            $demand->image = $newImageName;

            if ($request->has('country_id')) {
                $demand->country_id = $request->country_id;
            }
            if ($request->has('heading')) {
                $demand->heading = $request->heading;
            }
            if ($request->has('subtitle')) {
                $demand->subtitle = $request->subtitle;
            }
            if ($request->has('from_date')) {
                $demand->from_date = $request->from_date;
            }
            if ($request->has('to_date')) {
                $demand->to_date = $request->to_date;
            }
            if ($request->has('vacancy')) {
                $demand->vacancy = $request->vacancy;
            }
            if ($request->has('number_of_people_required')) {
                $demand->number_of_people_required = $request->number_of_people_required;
            }

            if ($request->has('demand_types') && is_array($request->demand_types)) {
                $demand->type = $request->demand_types[0] ?? null;
                // $demand->demand_types = json_encode($request->demand_types); // if you use json column
            }

            if ($demand->save()) {
                return redirect()->route('admin.demands.index')->with('success', 'Success! Project created.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Error! Project not created.');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors below.');
        } catch (\Exception $e) {
            Log::error('Error creating demand: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating demand. Please try again: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $demand = Demand::findOrFail($id);
        $countries = Country::all();

        // Pass related demands (exclude current demand)
        $relatedDemands = Demand::where('type', $demand->type)
            ->where('id', '!=', $demand->id)
            ->get();

        return view('backend.demand.update', compact('demand', 'countries', 'relatedDemands'));
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('image')) {
                $imageSize = $request->file('image')->getSize() / 1024;
                if ($imageSize > 2048) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Error! Image size cannot exceed 2 MB. Your image is ' . number_format($imageSize, 2) . ' KB.');
                }
            }

            $rules = [];

            if ($request->has('country_id')) {
                $rules['country_id'] = 'required|exists:countries,id';
            }
            if ($request->has('content')) {
                $rules['content'] = 'required|string';
            }
            if ($request->has('heading')) {
                $rules['heading'] = 'nullable|string|max:255';
            }
            if ($request->has('subtitle')) {
                $rules['subtitle'] = 'nullable|string|max:255';
            }
            if ($request->has('from_date')) {
                $rules['from_date'] = 'nullable|date';
            }
            if ($request->has('to_date')) {
                $rules['to_date'] = 'nullable|date|after_or_equal:from_date';
            }
            if ($request->has('vacancy')) {
                $rules['vacancy'] = 'nullable|string|max:255';
            }
            if ($request->has('demand_types')) {
                $rules['demand_types'] = 'nullable|array';
            }
            if ($request->hasFile('image')) {
                $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
            }

            $request->validate($rules);

            $demand = Demand::findOrFail($id);

            if ($request->has('country_id')) {
                $demand->country_id = $request->input('country_id');
            }
            if ($request->has('content')) {
                $demand->content = $request->input('content');
            }
            if ($request->has('heading')) {
                $demand->heading = $request->input('heading');
            }
            if ($request->has('subtitle')) {
                $demand->subtitle = $request->input('subtitle');
            }
            if ($request->has('from_date')) {
                $demand->from_date = $request->input('from_date');
            }
            if ($request->has('to_date')) {
                $demand->to_date = $request->input('to_date');
            }
            if ($request->has('vacancy')) {
                $demand->vacancy = $request->input('vacancy');
            }
            if ($request->has('number_of_people_required')) {
                $demand->number_of_people_required = $request->input('number_of_people_required');
            }

            if ($request->has('demand_types') && is_array($request->demand_types)) {
                $demand->type = $request->demand_types[0] ?? null;
                // $demand->demand_types = json_encode($request->demand_types);
            }

            if ($request->hasFile('image')) {
                if ($demand->image && file_exists(public_path('uploads/demands/' . $demand->image))) {
                    unlink(public_path('uploads/demands/' . $demand->image));
                }
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/demands'), $imageName);
                $demand->image = $imageName;
            }

            $demand->save();
            return redirect()->route('admin.demands.index')->with('success', 'Demand updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors below.');
        } catch (\Exception $e) {
            Log::error('Error updating demand: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating demand. Please try again: ' . $e->getMessage());
        }
    }

    public function destroy(Demand $demand)
    {
        try {
            if ($demand->image && file_exists(public_path('uploads/demands/' . $demand->image))) {
                unlink(public_path('uploads/demands/' . $demand->image));
            }

            $demand->delete();
            return redirect()->route('admin.demands.index')->with('success','Demand deleted successfully');

        } catch (\Exception $e) {
            Log::error('Error deleting demand: ' . $e->getMessage());
            return redirect()->route('admin.demands.index')->with('error', 'Error deleting demand.');
        }
    }


public function show($demandType)
{
    // Get demands that match the type in either 'type' column or 'demand_types' JSON array
    $demands = Demand::where(function($query) use ($demandType) {
        $query->where('type', $demandType)
              ->orWhereJsonContains('demand_types', $demandType);
    })
    ->orderBy('created_at', 'desc')
    ->get();
    
    // Define the mapping of values to display names
    $demandTypeNames = [
        'cyc' => 'Chautari Youth Project',
        'nsep' => 'Next Steps Education Program (NSEP)',
        'frp' => 'Family Reintegration',
        'community_empowerment' => 'Community Empowerment',
        'bamboo_project' => 'Bamboo Project',
        'child_care_home' => 'Child Care Home'
    ];
    
    $projectName = $demandTypeNames[$demandType] ?? 'Unknown Project';
    
    return view('projects.show', compact('demands', 'projectName', 'demandType'));
}

public function showProjectDemands($demandType)
{
    // Same logic as show method
    $demands = Demand::where(function($query) use ($demandType) {
        $query->where('type', $demandType)
              ->orWhereJsonContains('demand_types', $demandType);
    })
    ->orderBy('created_at', 'desc')
    ->get();
    
    $demandTypeNames = [
        'cyc' => 'Chautari Youth Project',
        'nsep' => 'Next Steps Education Program (NSEP)',
        'frp' => 'Family Reintegration',
        'community_empowerment' => 'Community Empowerment',
        'bamboo_project' => 'Bamboo Project',
        'child_care_home' => 'Child Care Home'
    ];
    
    $projectName = $demandTypeNames[$demandType] ?? 'Unknown Project';
    
    return view('projects.show', compact('demands', 'projectName', 'demandType'));
}

public function detail($id)
{
    try {
        $demand = Demand::with('country')->findOrFail($id);
        
        // Get related demands of the same type (excluding current demand)
        $relatedDemands = Demand::where(function($query) use ($demand) {
            if ($demand->type) {
                $query->where('type', $demand->type);
            }
            if ($demand->demand_types && is_array($demand->demand_types)) {
                foreach($demand->demand_types as $demandType) {
                    $query->orWhereJsonContains('demand_types', $demandType);
                }
            }
        })
        ->where('id', '!=', $demand->id)
        ->limit(5)
        ->get();
        
        return view('demands.detail', compact('demand', 'relatedDemands'));
        
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Demand not found.');
    }
}


}


