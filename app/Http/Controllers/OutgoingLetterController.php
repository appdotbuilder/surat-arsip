<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutgoingLetterRequest;
use App\Http\Requests\UpdateOutgoingLetterRequest;
use App\Models\OutgoingLetter;
use App\Models\LetterCategory;
use App\Models\LetterStatus;
use Inertia\Inertia;

class OutgoingLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = OutgoingLetter::with(['category', 'status', 'creator'])
            ->latest('sent_date')
            ->paginate(10);

        return Inertia::render('outgoing-letters/index', [
            'letters' => $letters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = LetterCategory::all();
        $statuses = LetterStatus::all();

        return Inertia::render('outgoing-letters/create', [
            'categories' => $categories,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOutgoingLetterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['created_by'] = auth()->id();

        $letter = OutgoingLetter::create($validatedData);

        return redirect()->route('outgoing-letters.show', $letter)
            ->with('success', 'Surat keluar berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OutgoingLetter $outgoingLetter)
    {
        $outgoingLetter->load(['category', 'status', 'creator']);

        return Inertia::render('outgoing-letters/show', [
            'letter' => $outgoingLetter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OutgoingLetter $outgoingLetter)
    {
        $categories = LetterCategory::all();
        $statuses = LetterStatus::all();

        return Inertia::render('outgoing-letters/edit', [
            'letter' => $outgoingLetter,
            'categories' => $categories,
            'statuses' => $statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutgoingLetterRequest $request, OutgoingLetter $outgoingLetter)
    {
        $outgoingLetter->update($request->validated());

        return redirect()->route('outgoing-letters.show', $outgoingLetter)
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OutgoingLetter $outgoingLetter)
    {
        $outgoingLetter->delete();

        return redirect()->route('outgoing-letters.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}