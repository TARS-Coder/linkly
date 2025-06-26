<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'superadmin') {
            $data = [
                'totalCompanies' => Company::count(),
                'totalUsers' => User::count(),
                'totalUrls' => Url::count(),
            ];
        } elseif ($user->role === 'admin') {
            $companyId = $user->company_id;
            $data = [
                'coadminCount' => User::where([['company_id', $companyId],['role', 'admin']])->count(),
                'memberCount' => User::where([['created_by', $user->id],['role', 'member']])->count(),
                'totalUrls' => Url::where('company_id', $companyId)->count(),
                'company' => Company::where('id', $companyId)->first(),
            ];
        } elseif ($user->role === 'member') {
            $data = [
                'admin' => User::where('id', $user->created_by)->first(),
                'totalUrls' => Url::where('user_id', $user->id)->count(),
                'company' => Company::where('id', $user->company_id)->first(),
            ];
        } else {
            $data = [];
        }

        return view('dashboard', ["data" => $data, "user" => $user]);
    }
}
