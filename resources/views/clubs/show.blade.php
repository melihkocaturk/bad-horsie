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
                        <x-link-button :href="route('clubs.edit', $club)">
                            Edit
                        </x-link-button>

                        <x-link-button :href="route('clubs.lessons.index', $club)">
                            Lessons
                        </x-link-button>

                        <div class="h-96 mt-6">
                            <img class="w-full h-full object-cover rounded-lg"
                                src="{{ asset('storage/' . $club->banner) }}" alt="{{ $club->name }}">
                        </div>

                        <div class="mt-6">
                            <img class="w-48 h-48 mb-6 mr-6 float-left rounded-lg"
                                src="{{ asset('storage/' . $club->logo) }}" alt="{{ $club->name }}">
                            <h3 class="text-lg font-bold text-gray-800">
                                {{ $club->name }}
                            </h3>
                            <p class="mt-1">{{ $club->description }}</p>
                            <table class="table-fixed mt-6">
                                <tbody>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">Address:</td>
                                        <td class="px-2 py-1">{{ $club->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">Phone:</td>
                                        <td class="px-2 py-1"><a href="tel:{{ $club->email }}">{{ $club->phone }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">E-mail:</td>
                                        <td class="px-2 py-1"><a
                                                href="mailto:{{ $club->email }}">{{ $club->email }}</a></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">Web:</td>
                                        <td class="px-2 py-1"><a href="{{ $club->web }}"
                                                target="blank">{{ $club->web }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">Coordinates:</td>
                                        <td class="px-2 py-1"><a href="{{ $club->coordinates }}"
                                                target="blank">{{ $club->coordinates }}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-lg font-bold text-gray-800">
                                Members
                            </h4>

                            @if (count($club->members) > 0)
                                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                                    @foreach ($club->members as $member)
                                        <div class="flex-shrink-0 group block">
                                            <div class="flex items-center">
                                                <img class="inline-block flex-shrink-0 h-[3rem] w-[3rem] rounded-full"
                                                    src="{{ asset('storage/' . $member->avatar) }}"
                                                    alt="{{ $member->name }}" />
                                                <div class="ml-3">
                                                    <h3 class="font-semibold text-gray-800 dark:text-white">
                                                        {{ $member->name }}
                                                    </h3>
                                                    <p class="text-sm font-medium text-gray-400">
                                                        <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="rounded-md border border-dashed border-slate-300 mt-6 p-8">
                                    <div class="text-center font-medium">
                                        No members yet.
                                    </div>
                                </div>
                            @endif
                        </div>

                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
