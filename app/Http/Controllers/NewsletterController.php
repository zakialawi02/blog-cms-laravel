<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Newsletter',
        ];

        $newsletters = Newsletter::latest()->get();

        return view('pages.back.newslaetters.index', compact('data', 'newsletters'));
    }

    /**
     * Store a newly created resource in storage.
     * Ajax call/request
     */
    public function store(Request $request)
    {
        $email = $request->email;

        $saved = Newsletter::firstOrCreate(['email' => $email]);

        if ($saved) {
            if ($saved->wasRecentlyCreated) {
                return response()->json(['success' => true, 'message' => 'You have successfully subscribed to our newsletter.']);
            } else {
                return response()->json(['success' => false, 'message' => 'This email address is already subscribed.']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Failed to save. Please try again.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return redirect()->route('admin.newsletter.index')->with('success', 'Newsletter deleted successfully.');
    }
}
