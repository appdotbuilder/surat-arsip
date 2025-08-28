<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomingLetterRequest;
use App\Http\Requests\UpdateIncomingLetterRequest;
use App\Models\IncomingLetter;
use App\Models\LetterCategory;
use App\Models\LetterStatus;
use Inertia\Inertia;

class IncomingLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = IncomingLetter::with(['category', 'status', 'creator'])
            ->latest('received_date')
            ->paginate(10);

        return Inertia::render('incoming-letters/index', [
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

        return Inertia::render('incoming-letters/create', [
            'categories' => $categories,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomingLetterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['created_by'] = auth()->id();

        $letter = IncomingLetter::create($validatedData);

        return redirect()->route('incoming-letters.show', $letter)
            ->with('success', 'Surat masuk berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomingLetter $incomingLetter)
    {
        $incomingLetter->load(['category', 'status', 'creator']);

        return Inertia::render('incoming-letters/show', [
            'letter' => $incomingLetter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomingLetter $incomingLetter)
    {
        $categories = LetterCategory::all();
        $statuses = LetterStatus::all();

        return Inertia::render('incoming-letters/edit', [
            'letter' => $incomingLetter,
            'categories' => $categories,
            'statuses' => $statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomingLetterRequest $request, IncomingLetter $incomingLetter)
    {
        $incomingLetter->update($request->validated());

        return redirect()->route('incoming-letters.show', $incomingLetter)
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomingLetter $incomingLetter)
    {
        $incomingLetter->delete();

        return redirect()->route('incoming-letters.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}