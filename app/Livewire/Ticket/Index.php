<?php

namespace App\Livewire\Ticket;

use App\Models\Scopes\MyTaskScope;
use App\Models\Ticket;
use Livewire\Component;
use Livewire\Attributes\Url;

class Index extends Component
{

    #[Url]
    public $search = '';

    public function render()
    {
        return view('livewire.ticket.index', [
            'tickets' => Ticket::query()
                ->search($this->search, 'title', 'description', 'priority')
                ->paginate(10),
        ]);
    }
}
