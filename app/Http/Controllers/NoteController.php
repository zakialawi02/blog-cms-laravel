<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        return view('pages.notes', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.notes_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|min:5',
            'note'   => 'required|min:10',
        ]);
        $slug = Str::slug($request->title);

        if (Note::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . uniqid();
        }

        $note = Note::create([
            'title' => $request->title,
            'slug' => $slug,
            'note' => $request->note
        ]);

        //redirect to notes
        if ($note) {
            return redirect()->route('notes')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Gagal menyimpan catatan.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
