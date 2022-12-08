<?php

namespace App\Http\Controllers;

use App\Models\Rv\ClubMemberOnboarding;
use App\Models\Rv\OnboardingStatus;
use Illuminate\Http\Request;

class ClubMemberOnboardingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clubmemberonboarding.index');
    }


    public function invitation(ClubMemberOnboarding $onboarding)
    {
        if ($onboarding->status != OnboardingStatus::WaitRegistration) {
            // log this here
            abort(404);
        }

        return view('clubmemberonboarding.register', [
            'onboarding' => $onboarding,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rv\ClubMemberOnboarding  $clubMemberOnboarding
     * @return \Illuminate\Http\Response
     */
    public function show(ClubMemberOnboarding $clubMemberOnboarding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rv\ClubMemberOnboarding  $clubMemberOnboarding
     * @return \Illuminate\Http\Response
     */
    public function edit(ClubMemberOnboarding $clubMemberOnboarding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rv\ClubMemberOnboarding  $clubMemberOnboarding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClubMemberOnboarding $clubMemberOnboarding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rv\ClubMemberOnboarding  $clubMemberOnboarding
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClubMemberOnboarding $clubMemberOnboarding)
    {
        //
    }
}
