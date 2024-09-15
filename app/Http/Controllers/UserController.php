<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', ['users' => $users]);

    }

    public function create(){
       /*  $users = User::all(['id', 'fullname'])->map(function ($user) {
            return [ 
                'value' => $user->id,
                'label' => $user->fullname
            ];
        });

        return view('users.create', ['user' => new User]); */

        return view ('users.create');
    }

    

    public function edit(User $user){
       /*  $users = User::all(['id', 'fullname'])->map(function ($user) {
            return [ 
                'value' => $user->id,
                'label' => $user->fullname
            ];
        }); */
        return view('users.edit', ['user' => $user]);
    }

  /*   public function store(Request $request)
    {
        $validator = $this->getValidationRules();
        $data = $request->validate($validator['rules'], $validator['messages'], $validator['attributes']);
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('users.index');
    } */
 
    public function store(Request $request)
{
    $data = $request->validate([
        'fullname' => 'required|min:3|max:50',
        'email' => 'required|email|unique:users|max:150',
        'password' => 'required|min:8',
        'role' => 'required|in:admin,super_admin' // Ensures only valid roles
    ]);
    
    $data['password'] = Hash::make($request->password);
    User::create($data);
    
    return redirect()->route('users.index')->with('success', 'User created successfully.');
}


public function update(Request $request, User $user)
{
    $data = $request->validate([
        'fullname' => 'required|min:3|max:50',
        'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        'password' => 'nullable|min:8',
        'role' => 'required|in:admin,super_admin' 
    ]);

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


    public function destroy(){
        return "This is the destroy function";
    }

    private function getValidationRules($userId = null) {
        $rules = [
            'fullname' => 'required|min:3|max:50',
            'email' => ['required', 'email', 'max:150'],
            'password' => 'required|min:8',
            'role' => 'required|in:super_admin,admin'
        ];
    
        if ($userId != null) {
            $rules['email'][] = Rule::unique('users')->ignore($userId);
        } else {
            $rules['email'][] = 'unique:users';
        }
    
        $messages = [
            'role.required' => 'Please select a role',
        ];
    
        $attributes = [
            'role' => 'role'
        ];
    
        return ['rules' => $rules, 'messages' => $messages, 'attributes' => $attributes];
    }
    
}


