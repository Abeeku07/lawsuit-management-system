<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawsuit; 
use App\Models\Applicant;
use App\Models\Defendant;
use App\Models\Court;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeApplicantMessage;
use App\Mail\WelcomeDefendantMessage;


class LawsuitController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        if ($search) {
            $search = "%$search%";
            
            $lawsuits = Lawsuit::where('lawsuit_name', 'like', $search)
                ->orWhere('citation', 'like', $search)
                ->orWhere('applicant_name', 'like', $search)
                ->orWhere('defendant_name', 'like', $search)
                ->orderBy('lawsuit_name', 'asc')
                ->paginate(5); 
        } else {
            $lawsuits = Lawsuit::orderBy('lawsuit_name', 'asc')->simplePaginate(5);
        }

        return view('lawsuits.index', compact('lawsuits'));
    }

    public function show(Lawsuit $lawsuit)
    {
        return view('lawsuits.show', compact('lawsuit'));
    }

    public function create()
    {
        $courts = Court::all(['id', 'name']); // Correct retrieval of court data
        $applicants = Applicant::all(['id', 'name', 'email']);
        $defendants = Defendant::all(['id', 'name', 'email']);
        $action = route('lawsuits.store'); 
    
        return view('lawsuits.create', compact('courts', 'applicants', 'defendants', 'action'));
    }
    

    public function store(Request $request)
    {
        $validator = $this->getValidationRules();
        $data = $request->validate($validator['rules'], $validator['messages'], $validator['attributes']); 
    
        // Find or create the applicant
        $applicant = Applicant::firstOrCreate(
            ['email' => $data['applicant_email']],
            ['name' => $data['applicant_name'], 'phone' => $data['applicant_phone']]
        );
    
        // Find or create the defendant
        $defendant = Defendant::firstOrCreate(
            ['email' => $data['defendant_email']],
            ['name' => $data['defendant_name'], 'phone' => $data['defendant_phone']]
        );
    
        // Create the lawsuit (save the Lawsuit object for later use)
        $lawsuit = Lawsuit::create([
            'lawsuit_name' => $data['lawsuit_name'],
            'citation' => $data['citation'],
            'court_id' => $data['court_id'],
            'applicant_id' => $applicant->id,
            'defendant_id' => $defendant->id,
            'doc' => $data['doc'],
        ]);
    

 // Send email to applicant
          Mail::to($applicant->email)->send(new WelcomeApplicantMessage($lawsuit, $applicant, $defendant));

 // Send email to defendant
         Mail::to($defendant->email)->send(new WelcomeDefendantMessage($lawsuit, $defendant, $applicant));

        return redirect()->route('lawsuits.index')->with('success', 'Lawsuit created successfully, and notices have been sent to both applicant and defendant.');
    }
    
    
    


    public function edit(Lawsuit $lawsuit)
{
    $courts = Court::all(['id', 'name']);
    $applicants = Applicant::all(['id', 'name', 'email']);
    $defendants = Defendant::all(['id', 'name', 'email']);
    $action = route('lawsuits.update', $lawsuit->id); 

    return view('lawsuits.edit', compact('lawsuit', 'courts', 'applicants', 'defendants', 'action'));
}

    public function update(Request $request, Lawsuit $lawsuit)
    {
        $validator = $this->getValidationRules($lawsuit->id);
        $data = $request->validate($validator['rules'], $validator['messages'], $validator['attributes']);

        $lawsuit->update($data);

        return redirect()->route('lawsuits.index')->with('alertMessage', "{$data['lawsuit_name']} edited successfully");
    }

    public function destroy(Lawsuit $lawsuit)
    {
        $lawsuit->delete();

        return redirect()->route('lawsuits.index')
            ->with('alertMessage', "{$lawsuit->lawsuit_name} deleted successfully")->with('type', 'success');
    }

    private function getValidationRules($lawsuitId = null)
    {
        $rules = [
            'lawsuit_name' => 'required|string|min:3|max:255',
            'doc' => 'required|date',
            'court_id' => 'required|exists:courts,id',
            'citation' => 'required|string|min:3|max:100',
            'applicant_name' => 'required|string|min:3|max:100',
            'defendant_name' => 'required|string|min:3|max:100',
            'applicant_email' => ['required', 'email', 'max:150'],
            'defendant_email' => ['required', 'email', 'max:150'],
            'applicant_phone' => 'required|string|max:20',  // Add validation for applicant phone
            'defendant_phone' => 'required|string|max:20',  // Add validation for defendant phone
        ];
    
        $messages = [
            'court_id.required' => 'Please select a court',
        ];
    
        $attributes = [
            'doc' => 'date of commencement',
            'court_id' => 'court',
        ];
    
        return ['rules' => $rules, 'messages' => $messages, 'attributes' => $attributes];
    }
    
}
