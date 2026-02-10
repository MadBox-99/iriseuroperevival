<?php

declare(strict_types=1);

namespace App\Livewire\Pages;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Ministry Team - Europe Revival 2026')]
class MinistryTeam extends Component
{
    #[Validate('required|string|max:255')]
    public string $first_name = '';

    #[Validate('required|string|max:255')]
    public string $last_name = '';

    #[Validate('required|email|max:255')]
    public string $email = '';

    #[Validate('required|string|max:50')]
    public string $phone = '';

    #[Validate('required|string|max:255')]
    public string $country = '';

    #[Validate('required|string|max:255')]
    public string $church_name = '';

    #[Validate('required|string|max:255')]
    public string $church_city = '';

    #[Validate('required|string|max:255')]
    public string $pastor_name = '';

    #[Validate('required|email|max:255')]
    public string $pastor_email = '';

    /** @var array<int, string> */
    #[Validate('required|array|min:1')]
    public array $service_areas = [];

    #[Validate('nullable|string|max:2000')]
    public string $experience = '';

    #[Validate('required|string|max:2000')]
    public string $testimony = '';

    public bool $training_agreement = false;

    public bool $privacy_agreement = false;

    public bool $submitted = false;

    public function submit(): void
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:255',
            'church_name' => 'required|string|max:255',
            'church_city' => 'required|string|max:255',
            'pastor_name' => 'required|string|max:255',
            'pastor_email' => 'required|email|max:255',
            'service_areas' => 'required|array|min:1',
            'experience' => 'nullable|string|max:2000',
            'testimony' => 'required|string|max:2000',
            'training_agreement' => 'accepted',
            'privacy_agreement' => 'accepted',
        ]);

        // TODO: Persist application to database and send confirmation email
        $this->submitted = true;
    }

    public function render(): View
    {
        return view('livewire.pages.ministry-team');
    }
}
