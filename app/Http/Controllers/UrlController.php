<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url; // Assuming you have a Url model
use Hashids\Hashids;

class UrlController extends Controller
{
    protected function hashids(Url $url)
    {
        $hashid = new Hashids(config('app.key'), 10);
        return $hashid->encode($url->id);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check the user's role and fetch URLs accordingly
        if(auth()->user()->role == "superadmin") {
            // If the user is a superadmin, fetch all URLs across all companies
            $urls = Url::orderBy('created_at', 'desc')->paginate(10);
        }else if(auth()->user()->role == "admin"){
            // If the user is an admin, fetch all URLs
            $urls = Url::where('company_id', auth()->user()->company_id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else if(auth()->user()->role == "member") {
            // If the user is a member, fetch only URLs created by them
            $urls = Url::where('company_id', auth()->user()->company_id)
                ->where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('url.index', ["urls"=>$urls]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('url.create');
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string'],
            'original_url' => ['required','string'],
        ]);

        $data += [
            'clicks' => 0,
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company_id,
        ];

       $url = Url::create($data);

        $url->where('id', $url->id)->update([
            'short_url' => $this->hashids($url),
        ]);

        return redirect()->route('url.index')->with('success', 'URL created successfully!');

    }

    public function destroy(Url $url)
    {
        try{
            $url->delete(); // performs soft delete

            return redirect()->route('url.index')
                            ->with('message', 'URL Deleted Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Delete failed: ' . $e->getMessage());
        }
    }

    public function redirect($hash)
    {
        $hashid = new Hashids(config('app.key'), 10);
        $decoded = $hashid->decode($hash);

        if (empty($decoded)) {
                abort(404, 'Unauthorized action.');
        }

        $url = Url::find($decoded[0]);

        if (!$url) {
                abort(404, 'Not Found');
        }

        // Increment the click count
        $url->increment('clicks');

        return redirect($url->original_url);
    }
}
