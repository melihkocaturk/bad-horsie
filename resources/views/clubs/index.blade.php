<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <x-link-button :href="route('clubs.create')">
                            {{ __('Add New Club') }}
                        </x-link-button>

                        @if (count($clubs) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($clubs as $club)
                                    <a class="flex flex-wrap flex-col mt-6 bg-white border shadow-sm rounded-lg hover:shadow-lg transition dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]"
                                        href="{{ route('clubs.show', $club) }}">
                                        <img class="w-full h-auto rounded-t-lg"
                                            src="{{ Storage::url($club->logo) }}" alt="{{ $club->name }}">
                                        <div class="p-4 md:p-5">
                                            <h3 class="text-lg font-bold text-center text-gray-800">
                                                {{ $club->name }}
                                            </h3>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-md border border-dashed border-slate-300 mt-6 p-8">
                                <div class="text-center font-medium">
                                    {{ __('No clubs yet.') }}
                                </div>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
