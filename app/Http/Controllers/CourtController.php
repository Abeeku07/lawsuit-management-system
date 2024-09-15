<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawsuit;
use App\Models\Court;

class CourtController extends Controller
{
    // Display all courts
    public function index()
    {
        $courts = Court::all();
        return view('courts.index', ['courts' => $courts]);
    }

    // Show individual court (you can customize this as needed)
    public function show(string $id)
    {
        return [
            'this is to show the court show function'
        ];
    }

    // Display form for creating a new court
    public function create()
    {
        // Retrieve all lawsuits to potentially attach to the court
        $lawsuits = Lawsuit::all();
        $action = route('courts.store'); // Correct route for creating a court

        return view('courts.create', [
            'lawsuits' => $lawsuits,
            'court' => new Court(),
            'action' => $action,
        ]);
    }

    // Store a new court in the database
    public function store(Request $request)
    {
        // Validate court data
        $data = $request->validate([
            'name' => 'required|unique:courts|max:150|min:4',
            'location' => 'required|string|max:255',
            'jurisdiction' => 'required|string|max:255',
        ]);

        // Create the court
        $court = Court::create($data);

        // Attach lawsuits to the court if they are selected
        if ($request->has('lawsuit_id')) {
            $court->lawsuits()->attach($request->input('lawsuit_id'));
        }

        return redirect()->route('courts.index')->with('success', "{$court->name} created successfully");
    }

    // Display form for editing an existing court
    public function edit(Court $court)
    {
        // Retrieve all lawsuits to potentially attach to the court
        $lawsuits = Lawsuit::all();
        $action = route('courts.update', $court->id); // Correct route for updating a court

        return view('courts.edit', [
            'lawsuits' => $lawsuits,
            'court' => $court,
            'action' => $action,
        ]);
    }

    // Update an existing court in the database
    public function update(Request $request, Court $court)
    {
        // Validate court data
        $data = $request->validate([
            'name' => 'required|unique:courts,name,' . $court->id . '|max:150|min:4',
            'location' => 'required|string|max:255',
            'jurisdiction' => 'required|string|max:255',
        ]);

        // Update the court
        $court->update($data);

        // Sync lawsuits if they are selected
        if ($request->has('lawsuit_id')) {
            $court->lawsuits()->sync($request->input('lawsuit_id'));
        }

        return redirect()->route('courts.index')->with('success', 'Court updated successfully');
    }

    // Delete a court
    public function destroy(Court $court)
    {
        $court->delete();

        return redirect()->route('courts.index')->with('success', "Court {$court->name} deleted successfully");
    }
}
