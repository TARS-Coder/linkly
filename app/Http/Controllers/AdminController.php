<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use App\Mail\InviteUserMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where("company_id",auth()->user()->company_id)->orderBy("created_at","desc")->paginate(10);
        return view("myproject.index",["users" => $users] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("myproject.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => ['required',''],
            'is_active' => ['nullable', 'boolean'],
        ],[
            'email.unique' => 'This Email is already registered with another user.',
        ]);

        $token = Str::random(60); // Generate a random token for the user
        $data += [
            'created_by' => auth()->id(),
            'company_id' => auth()->user()->company_id,
            'invite_token' => $token,
            ];
        $user = User::create( $data);

        // Send the invitation email
        Mail::to($user["email"])->send(new InviteUserMail($user));
        
        // Log the invitation
        \Log::info("Invite sent to: {$user->email}");

        return redirect()->route('admin.myproject.show', $user)
                         ->with('message', 'User Added Successfully');

    } catch (ValidationException $e) {
        // Redirect back with errors and old input
        return redirect()->back()
                         ->withErrors($e->validator)
                         ->withInput();
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $user)
    {
        $data = User::where([['id', "=", $user], ["company_id","=", auth()->user()->company_id]])->firstOrFail();
        return view('myproject.show',['user'=> $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('myproject.edit',['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete(); // performs soft delete

            return redirect()->route('admin.myproject.index')
                            ->with('message', 'User Deleted Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }
}
