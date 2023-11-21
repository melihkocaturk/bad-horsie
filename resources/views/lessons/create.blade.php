<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[
        'Clubs' => route('clubs.index'),
        $club->name => route('clubs.show', $club),
        'Lessons' => route('clubs.lessons.index', $club),
    ]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add New Lesson') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('clubs.lessons.store', $club) }}" class="mt-6 space-y-6">
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

                            <!-- Trainer -->
                            @php
                                $options = [];
                                foreach ($club->members as $member) {
                                    if ('trainer' === $member->type) {
                                        $options += [$member->id => $member->name];
                                    }
                                }
                            @endphp

                            <div>
                                <x-input-label for="trainer_id" :value="__('Trainer')" />
                                <x-select-box id="trainer_id" class="block mt-1" name="trainer_id" :options="$options"
                                    :selected="old('trainer_id')" />
                                <x-input-error :messages="$errors->get('trainer_id')" class="mt-2" />
                            </div>

                            <!-- Student -->
                            @php
                                $options = [];
                                foreach ($club->members as $member) {
                                    if ('student' === $member->type) {
                                        $options += [$member->id => $member->name];
                                    }
                                }
                            @endphp

                            <div>
                                <x-input-label for="student" :value="__('Student')" />
                                <x-select-box id="student" class="block mt-1" name="student_id" :options="$options"
                                    :selected="old('student_id')" />
                                <x-input-error :messages="$errors->get('student')" class="mt-2" />
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
