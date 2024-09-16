<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defendant;
use App\Models\Applicant;
// use App\Mail\ServeNoticeMessage;

class DefendantController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
    
        if ($search) {
            $search = "%$search%";
    
            $defendants = Defendant::where('name', 'like', $search)
                ->orWhere('phone', 'like', $search)
                ->orWhere('email', 'like', $search)
                ->orderBy('name', 'asc')
                ->paginate(5);
        } else {
            $defendants = Defendant::orderBy('name', 'asc')->simplePaginate(5);
        }
    
        return view('defendants.index', compact('defendants'));
    }
    

    public function show(string $id)
    {
        $defendant = Defendant::with('lawsuits')->findOrFail($id);
        return view('defendants.show', ['defendant' => $defendant]);
    }

       public function create(){
      
        return view('defendants.create');
        }


        public function store(Request $request)
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|string|email|max:255|unique:defendants',
            ]);
        
            Defendant::create($data);

                // Sending mail to the defendant

            // Mail::to($defendant->email)->send(new ServeNoticeMessage($defendant));
        
            return redirect()->route('defendants.index')->with('success', 'Defendant created successfully');
        }
        

        public function edit(Defendant $defendant)
       {
           return view('defendants.edit', ['defendant' => $defendant]);
       }


       public function update(Request $request, Defendant $defendant)
       {
           $data = $request->validate([
            //    'name' => 'required|unique:subjects,name,' . $subject->id . '|max:150|min:4',
            'name' => 'required' . $defendant->id ,
           ]);
   
           $subject->update($data);
           return redirect()->route('defendants.index');
       }

       public function destroy(Defendant $defendant){
        return   $defendant->delete();
        // return redirect()->route('defendants.index')
        // ->with('alertMessage',"defendant {$defendant->name} deleted successfully")->with('type', 'success');;

        return redirect()->route('defendants.index');
       }
}
