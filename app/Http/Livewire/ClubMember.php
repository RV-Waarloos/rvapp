<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ClubMember extends Component
{
    public function list()
    {
        return view('livewire.club-member');
    }


    public function render()
    {
        return view('livewire.club-member');
        // ->layout('layouts.app');
    }
}
