<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first('email')], 400);
        }

        $saved = Newsletter::firstOrCreate(['email' => $email]);

        if ($saved) {
            if ($saved->wasRecentlyCreated) {
                return response()->json(['success' => true, 'message' => 'You have successfully subscribed to our newsletter.'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'This email address is already subscribed.'], 400);
            }
        }

        return response()->json(['success' => false, 'message' => 'Failed to save. Please try again.'], 500);
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
