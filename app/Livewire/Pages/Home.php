<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use App\Models\Faq;
use App\Models\Speaker;
use App\Models\Sponsor;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Europe Revival 2026 - Encounter Jesus. Catch on Fire.')]
class Home extends Component
{
    public function render(): View
    {
        $featuredSpeakers = Speaker::query()
            ->featured()
            ->ordered()
            ->get();

        $workshopLeaders = Speaker::query()
            ->ofType('workshop_leader')
            ->ordered()
            ->get();

        $mainSponsor = Sponsor::query()
            ->active()
            ->ofTier('platinum')
            ->ordered()
            ->first();

        $partnerSponsors = Sponsor::query()
            ->active()
            ->whereNot('tier', 'platinum')
            ->byTierPriority()
            ->ordered()
            ->get();

        $faqs = Faq::query()
            ->published()
            ->ordered()
            ->get();

        return view('livewire.pages.home', [
            'featuredSpeakers' => $featuredSpeakers,
            'workshopLeaders' => $workshopLeaders,
            'mainSponsor' => $mainSponsor,
            'partnerSponsors' => $partnerSponsors,
            'faqs' => $faqs,
        ]);
    }
}
