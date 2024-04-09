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
        foreach ($notes as $note) {
            $note->clean_note = strip_tags($note->note);
        }
        return view('pages.back.notes', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.back.notes_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
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
    public function show(String $note)
    {
        $note = Note::where('id', $note)->orWhere('slug', $note)->firstOrFail();
        return $note;
        dd($note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $note)
    {
        $note = Note::where('id', $note)->orWhere('slug', $note)->firstOrFail();
        return view('pages.back.notes_edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $note)
    {
        // dd($request->all());
        $this->validate($request, [
            'title'     => 'required|min:5',
            'note'   => 'required|min:10',
        ]);

        $slug = Str::slug($request->title);

        if (Note::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . uniqid();
        }

        $note = Note::where('id', $note)->update([
            'title' => $request->title,
            'slug' => $slug,
            'note' => $request->note
        ]);

        if ($note) {
            return redirect()->route('notes')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Gagal menyimpan catatan.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $note)
    {
        $note = Note::where('id', $note)->orWhere('slug', $note)->firstOrFail();
        $note->delete();
        if ($note) {
            return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Gagal menghapus catatan.']);
        }
    }

    public function indexme()
    {
        $notes = Note::all();
        foreach ($notes as $note) {
            $note->clean_note = strip_tags($note->note);
        }
        return view('pages.front.notes', compact('notes'));
    }
}
