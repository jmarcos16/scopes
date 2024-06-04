<div>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-900">Create Ticket</h1>
                </div>
            </div>

            <div class="mt-6 bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900">Ticket Information</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Fill in the form below to create a new ticket.</p>
                    <form wire:submit="save" class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input 
                                    wire:model="title"
                                    id="title"
                                    name="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    autofocus
                                    autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="priority" :value="__('Priority')" />
                            <select wire:model="priority"
                                id="priority"
                                name="priority"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                @foreach (\App\Enums\TickerPriorityEnum::cases() as $priority)
                                    <option value="{{ $priority->value }}">{{ $priority->description() }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('priority')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea wire:model="description" id="description" name="description" rows="3"
                                class="mt-1 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>