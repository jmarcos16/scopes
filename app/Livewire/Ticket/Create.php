<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Create extends Component
{
    public string $title = '';
    public string $description = '';
    public string $priority = 'low';

    public function mount(){
        $this->title = fake()->sentence(6);
        $this->description = fake()->sentence(20);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|min:6',
            'description' => 'required|min:6',
            'priority' => 'required',
        ]);

        Ticket::query()->create([
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'user_id' => auth()->id(),
        ]);       

        return to_route('dashboard');
    }

    public function render()
    {
        return view('livewire.ticket.create');
    }

    
}
