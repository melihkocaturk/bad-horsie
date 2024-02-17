<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horses') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[
        'Clubs' => route('clubs.index'),
        $club->name => route('clubs.show', $club),
    ]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <x-link-button :href="route('clubs.horses.create', $club)">
                            Add New Horse
                        </x-link-button>

                        @if (count($club->horses) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($club->horses as $horse)
                                    <a class="flex flex-wrap flex-col mt-6 bg-white border shadow-sm rounded-lg hover:shadow-lg transition dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]"
                                        href="{{ route('clubs.horses.show', ['club' => $club, 'horse' => $horse]) }}">
                                        <img class="w-full h-auto rounded-t-lg"
                                            src="{{ Storage::url($horse->avatar) }}" alt="{{ $horse->name }}">
                                        <div class="p-4 md:p-5">
                                            <h3 class="text-lg font-bold text-gray-800">
                                                {{ $horse->name }}
                                            </h3>
                                            <p class="mt-1 text-gray-800 dark:text-gray-400">
                                                {{ $horse->description }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-md border border-dashed border-slate-300 mt-6 p-8">
                                <div class="text-center font-medium">
                                    No horses yet.
                                </div>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
