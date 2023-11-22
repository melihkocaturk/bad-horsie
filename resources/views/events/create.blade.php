<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="['Events' => route('events.index')]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add New Event') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('events.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name')" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Start -->
                            <div>
                                <x-input-label for="start" :value="__('Start')" />
                                <x-datetime-input id="start" name="start" class="mt-1 block w-full"
                                    :value="old('start')" />
                                <x-input-error class="mt-2" :messages="$errors->get('start')" />
                            </div>

                            <!-- End -->
                            <div>
                                <x-input-label for="end" :value="__('End')" />
                                <x-datetime-input id="end" name="end" class="mt-1 block w-full"
                                    :value="old('end')" />
                                <x-input-error class="mt-2" :messages="$errors->get('end')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
