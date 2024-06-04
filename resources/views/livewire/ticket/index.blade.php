<div>
    <div class="max-w-7xl mx-auto">
        
        <div>
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-900">All Tickets</h1>

                <div>
                    <x-text-input wire:model.live.debounce.250ms="search" placeholder="Search tickets..." />
                    <a href="{{ route('tickets.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Ticket
                    </a>
                </div>
            </div>
        </div>
        
        <div class="inline-block min-w-full py-4 align-middle">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#</th>
                            <th scope="col" class="px-3 py-4 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Title
                            </th>
                            <th scope="col" class="px-3 py-4 text-left text-sm font-semibold text-gray-900">
                                Priority
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($tickets as $ticket)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">
                                {{$ticket->id}}
                            </td>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $ticket->title}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                <span class="bg-{{$ticket->priority->color()}}-600 px-2 rounded">
                                    {{ $ticket->priority->description() }} 
                                </span>
                            </td>
                            <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <div class="inline-block text-left" x-data="{ menu: false }">
                                    <button x-on:click="menu = ! menu" type="button"
                                        class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <span class="sr-only"></span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                    <div x-show="menu" x-on:click.away="menu = false"
                                        class="origin-top-right absolute right-32 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                        tabindex="-1">
                                        <div class="" role="none">
                                            <a href="#"
                                                class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1" id="menu-item-0">
                                                Detalle
                                            </a>
                                        </div>
                                        <div class="" role="none">
                                            <a href="#"
                                                class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1" id="menu-item-0">
                                                Editar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>      
                        @empty
                            <tr>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900" colspan="4">
                                    No tickets found
                                </td>
                            </tr>                      
                        @endforelse
                    </tbody>
                </table>
                @if ($tickets->hasPages())
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $tickets->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
