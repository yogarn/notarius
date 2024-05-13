<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NoteController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Note::class);
        $query = request()->input('query');

        $notes = Note::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('updated_at', 'desc');

        if ($query) {
            $notes->where(function ($notes) use ($query) {
                $notes
                    ->where('title', 'like', "%$query%")
                    ->orWhere('content', 'like', "%$query%");
            });
        }

        $notes = $notes->paginate(15);

        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Note::class);
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Note::class);
        $data = $request->validate([
            'title' => ['string', 'required'],
            'content' => ['string', 'required']
        ]);
        $data['user_id'] = $request->user()->id;

        $note = Note::create($data);
        return to_route('notes.show', ['note' => $note]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $this->authorize('view', $note);
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);
        $data = $request->validate([
            'title' => ['string', 'required'],
            'content' => ['string', 'required']
        ]);

        $note->update($data);
        return to_route('notes.show', ['note' => $note]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return to_route('notes.index');
    }
}
