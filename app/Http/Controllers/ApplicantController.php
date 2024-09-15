<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
// use App\Mail\ServeNoticeMessage;

class ApplicantController extends Controller
{
    // Display the list of applicants
    public function index()
    {
        $applicants = Applicant::all();

        return view('applicants.index', [
            'applicants' => $applicants
        ]);
    }

    // Show an individual applicant (you can customize this view further)
    public function show(string $id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('applicants.show', ['applicant' => $applicant]);
    }

    // Show the form to create a new applicant
    public function create()
    {
        return view('applicants.create');
    }

    // Store the new applicant in the database
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:applicants',
            'phone' => 'required|string|max:20',
        ]);

        Applicant::create($data);

            // Sending mail to the applicant

      

        // Mail::to($applicant->email)->send(new ServeNoticeMessage($applicant, $defendant, $lawsuit));

        return redirect()->route('applicants.index')->with('success', 'Applicant created successfully');
    }

    // Show the form to edit an existing applicant
    public function edit(Applicant $applicant)
    {
        return view('applicants.edit', ['applicant' => $applicant]);
    }

    // Update the existing applicant's details
    public function update(Request $request, Applicant $applicant)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:applicants,email,' . $applicant->id,
            'phone' => 'required|string|max:20',
        ]);

        $applicant->update($data);

        return redirect()->route('applicants.index')->with('success', 'Applicant updated successfully');
    }

    // Delete an applicant
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();

        return redirect()->route('applicants.index')->with('success', "Applicant {$applicant->name} deleted successfully");
    }
}
