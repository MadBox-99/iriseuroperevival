<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index(): View
    {
        // TODO: Add Speaker, Sponsor, Faq models when ready
        $speakers = collect();
        $sponsors = collect();
        $faqs = collect();

        return view('home', compact('speakers', 'sponsors', 'faqs'));
    }

    /**
     * Display the full program/schedule page.
     */
    public function program(): View
    {
        return view('pages.program');
    }

    /**
     * Display the workshops page.
     */
    public function workshops(): View
    {
        $workshopLeaders = collect();

        return view('pages.workshops', compact('workshopLeaders'));
    }

    /**
     * Display all speakers.
     */
    public function speakers(): View
    {
        $mainSpeakers = collect();
        $workshopLeaders = collect();

        return view('pages.speakers', compact('mainSpeakers', 'workshopLeaders'));
    }

    /**
     * Display a single speaker.
     */
    public function speaker(string $slug): View
    {
        abort(404); // TODO: implement when Speaker model is ready
    }

    /**
     * Subscribe to newsletter.
     */
    public function subscribeNewsletter(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // TODO: Add NewsletterSubscriber model when ready

        return back()->with('success', 'Thank you for subscribing!');
    }

    /**
     * Display the privacy policy.
     */
    public function privacy(): View
    {
        return view('pages.privacy');
    }

    /**
     * Display the terms of service.
     */
    public function terms(): View
    {
        return view('pages.terms');
    }
}
