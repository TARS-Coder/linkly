<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Email;
use Laravel\Pail\ValueObjects\Origin\Console;
use Illuminate\Validation\ValidationException;
use Str;
use App\Mail\InviteUserMail;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $companies = Company::query()->orderBy("created_at", "desc")->paginate(10);
        return view("company.index",["companies" => $companies]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("company.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:companies,email'],
            'desc' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'admin_name' => ['nullable', 'string'],
            'admin_email' => ['nullable', 'email', 'unique:users,email'],
        ],[
            'email.unique' => 'The Company with this email already exists.',
            'admin_email.unique' => 'This Email is already registered with another user.',
        ]);

        // Create the company
        $company = Company::create($data);

        if( isset($data['admin_email']) && isset($data['admin_name']) ) {
            $token = Str::random(60); // Generate a random token for the user
            $user = $company->users()->create([
                'name' => $data['admin_name'],
                'email' => $data['admin_email'],
                'role' => 'admin',
                'created_by' => auth()->id(),
                'company_id' => $company->id,
                'invite_token' => $token,
            ]);

            // Send the invitation email
            Mail::to($user->email)->send(new InviteUserMail($user));
            
            // Log the invitation
            \Log::info("Invite sent to: {$user->email}");
        } elseif( isset($data['admin_name']) && !isset($data['admin_email']) ) {
            throw ValidationException::withMessages([
                'admin_email' => 'You must provide an admin email and name to create a company.',
            ]);
        }


        return redirect()->route('company.show', $company)
                         ->with('message', 'Company Added Successfully');

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
    public function show(Company $company)
    {
        return view("company.show", ["company"=> $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view("company.edit", ["company" => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
    try {
        $adminUser = $company->users()->where('role', 'admin')->first();

        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:companies,email,'. $company->id],
            'desc' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'admin_name' => ['nullable', 'string'],
            'admin_email' => ['nullable', 'email', 'unique:users,email,'. ($adminUser ? $adminUser->id : 'NULL')],
        ],[
            'email.unique' => 'The Company with this email already exists.',
            'admin_email.unique' => 'This Email is already registered with another user.',
        ]);

        $company->update($data);

        // Update the admin user
        if( isset($adminUser)){
            if ($adminUser->email !== $data['admin_email']) {
                $token = Str::random(60);
                $adminUser->update([
                    'name' => $data['admin_name'],
                    'email' => $data['admin_email'],
                    'invite_token' => $token,
                ]);
                // Send the updated invitation email
                Mail::to($data['admin_email'])->send(new InviteUserMail($adminUser));
                \Log::info("Updated invite sent to: {$data['admin_email']}");
            }else {
                $adminUser->update(['name' => $data['admin_name']]);
            }
        }elseif ( isset($data['admin_email']) && isset($data['admin_name']) ) {
            $token = Str::random(60);
            $newuser = $company->users()->create([
            'name' => $data['admin_name'],
            'email' => $data['admin_email'],
            'role' => 'admin',
            'created_by' => auth()->id(),
            'company_id' => $company->id,
            'invite_token' => $token,
            ]);
            // Send the updated invitation email
            Mail::to($newuser['email'])->send(new InviteUserMail($newuser));
            \Log::info("Invite sent to: {$newuser['email']}");

        } elseif( isset($data['admin_name'])){
            throw ValidationException::withMessages([
                'admin_email' => 'You cannot set admin name without providing an admin email for invitation.',
            ]);
        }

        return redirect()->route('company.show', $company)
                         ->with('message', 'Company Updated Successfully');

    } catch (ValidationException $e) {
        // Redirect back with errors and old input
        return redirect()->back()
                         ->withErrors($e->validator)
                         ->withInput();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
    try {
        $company->delete(); // performs soft delete

        return redirect()->route('company.index')
                         ->with('message', 'Company Deleted Successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
    }
    }
}
