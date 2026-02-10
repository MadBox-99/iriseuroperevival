<?php

declare(strict_types=1);

use App\Livewire\Pages\MinistryTeam;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('renders the ministry team page successfully', function () {
    $this->get('/ministry-team')
        ->assertStatus(200)
        ->assertSeeLivewire(MinistryTeam::class);
});

it('displays all service area cards', function () {
    Livewire::test(MinistryTeam::class)
        ->assertSee('Evangelizációs csoportvezető')
        ->assertSee('Gyógyító szobák')
        ->assertSee('Prófétai szobák')
        ->assertSee('Dicsőítő csapat')
        ->assertSee('Ima csapat')
        ->assertSee('Gyermek szolgálat')
        ->assertSee('Fogadó szolgálat')
        ->assertSee('Technikai csapat')
        ->assertSee('Fordítók');
});

it('displays the training day schedule', function () {
    Livewire::test(MinistryTeam::class)
        ->assertSee('Tréning Nap')
        ->assertSee('2026. október 22.')
        ->assertSee('David Gava');
});

it('validates required form fields', function () {
    Livewire::test(MinistryTeam::class)
        ->call('submit')
        ->assertHasErrors([
            'first_name',
            'last_name',
            'email',
            'phone',
            'country',
            'church_name',
            'church_city',
            'pastor_name',
            'pastor_email',
            'service_areas',
            'testimony',
            'training_agreement',
            'privacy_agreement',
        ]);
});

it('submits the form successfully with valid data', function () {
    Livewire::test(MinistryTeam::class)
        ->set('first_name', 'János')
        ->set('last_name', 'Kovács')
        ->set('email', 'janos@example.com')
        ->set('phone', '+36301234567')
        ->set('country', 'Magyarország')
        ->set('church_name', 'Test Gyülekezet')
        ->set('church_city', 'Budapest')
        ->set('pastor_name', 'Pál Pásztor')
        ->set('pastor_email', 'pastor@example.com')
        ->set('service_areas', ['healing', 'prayer'])
        ->set('experience', 'Gyógyító szolgálat 2 éve')
        ->set('testimony', 'Isten megváltoztatta az életemet.')
        ->set('training_agreement', true)
        ->set('privacy_agreement', true)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);
});

it('shows success message after submission', function () {
    Livewire::test(MinistryTeam::class)
        ->set('first_name', 'János')
        ->set('last_name', 'Kovács')
        ->set('email', 'janos@example.com')
        ->set('phone', '+36301234567')
        ->set('country', 'Magyarország')
        ->set('church_name', 'Test Gyülekezet')
        ->set('church_city', 'Budapest')
        ->set('pastor_name', 'Pál Pásztor')
        ->set('pastor_email', 'pastor@example.com')
        ->set('service_areas', ['healing'])
        ->set('testimony', 'Isten megváltoztatta az életemet.')
        ->set('training_agreement', true)
        ->set('privacy_agreement', true)
        ->call('submit')
        ->assertSee('Köszönjük a jelentkezésedet');
});
