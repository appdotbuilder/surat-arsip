<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Models\CompanyProfile;
use Inertia\Inertia;

class CompanyProfileController extends Controller
{
    /**
     * Display the company profile.
     */
    public function index()
    {
        $profile = CompanyProfile::first() ?? new CompanyProfile();

        return Inertia::render('company-profile/index', [
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for editing the company profile.
     */
    public function edit()
    {
        $profile = CompanyProfile::first() ?? new CompanyProfile();

        return Inertia::render('company-profile/edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the company profile.
     */
    public function update(UpdateCompanyProfileRequest $request)
    {
        $profile = CompanyProfile::first();
        
        if ($profile) {
            $profile->update($request->validated());
        } else {
            CompanyProfile::create($request->validated());
        }

        return redirect()->route('company-profile.index')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}