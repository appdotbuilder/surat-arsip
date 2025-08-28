<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLetterCategoryRequest;
use App\Http\Requests\UpdateLetterCategoryRequest;
use App\Models\LetterCategory;
use Inertia\Inertia;

class LetterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = LetterCategory::withCount(['incomingLetters', 'outgoingLetters'])
            ->latest()
            ->paginate(10);

        return Inertia::render('letter-categories/index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('letter-categories/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLetterCategoryRequest $request)
    {
        $category = LetterCategory::create($request->validated());

        return redirect()->route('letter-categories.show', $category)
            ->with('success', 'Kategori surat berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LetterCategory $letterCategory)
    {
        $letterCategory->loadCount(['incomingLetters', 'outgoingLetters']);

        return Inertia::render('letter-categories/show', [
            'category' => $letterCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LetterCategory $letterCategory)
    {
        return Inertia::render('letter-categories/edit', [
            'category' => $letterCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLetterCategoryRequest $request, LetterCategory $letterCategory)
    {
        $letterCategory->update($request->validated());

        return redirect()->route('letter-categories.show', $letterCategory)
            ->with('success', 'Kategori surat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LetterCategory $letterCategory)
    {
        $letterCategory->delete();

        return redirect()->route('letter-categories.index')
            ->with('success', 'Kategori surat berhasil dihapus.');
    }
}