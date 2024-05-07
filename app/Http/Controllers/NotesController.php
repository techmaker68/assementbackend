<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotesRequest;
use App\Http\Resources\NotesResource;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::fromToken();
        $notes = $user->notes;
        return NotesResource::collection($notes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotesRequest $request)
    {
        $data = $request->validated();
        $user = User::fromToken();
        $notes = $user->notes;
        Note::create([
            'user_id' => $user->id,
            'content' => $data['content'],
            'title' => $data['title'],
        ]);

        return NotesResource::collection($notes);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotesRequest $request, string $id)
    {
        $data = $request->validated();
        $user = User::fromToken();
        $notes = $user->notes;
        $note = Note::find($id);
        $note->content = $data['content'];
        $note->title = $data['title'];
        $note->save();
        return NotesResource::collection($notes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::find($id)->delete();
        $user = User::fromToken();
        $notes = $user->notes;
        return NotesResource::collection($notes);
    }
}
