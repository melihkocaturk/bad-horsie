<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[__('Clubs') => route('clubs.index')]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <x-link-button :href="route('clubs.edit', $club)">
                            {{ __('Edit') }}
                        </x-link-button>

                        <x-link-button :href="route('clubs.lessons.index', $club)">
                            {{ __('Lessons') }}
                        </x-link-button>

                        <x-link-button :href="route('clubs.horses.index', $club)">
                            {{ __('Horses') }}
                        </x-link-button>

                        <div class="h-96 mt-6">
                            <img class="w-full h-full object-cover rounded-lg"
                                src="{{ Storage::url($club->banner) }}" alt="{{ $club->name }}">
                        </div>

                        <div class="mt-6">
                            <img class="w-48 h-48 mb-6 mr-6 float-left rounded-lg"
                                src="{{ Storage::url($club->logo) }}" alt="{{ $club->name }}">
                            <h3 class="text-lg font-bold text-gray-800">
                                {{ $club->name }}
                            </h3>
                            <p class="mt-1">{{ $club->description }}</p>
                            <table class="table-fixed mt-6">
                                <tbody>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">{{ __('Address') }}:</td>
                                        <td class="px-2 py-1">{{ $club->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">{{ __('Phone') }}:</td>
                                        <td class="px-2 py-1"><a href="tel:{{ $club->email }}">{{ $club->phone }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">{{ __('E-mail') }}:</td>
                                        <td class="px-2 py-1"><a
                                                href="mailto:{{ $club->email }}">{{ $club->email }}</a></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">{{ __('Web') }}:</td>
                                        <td class="px-2 py-1"><a href="{{ $club->web }}"
                                                target="blank">{{ $club->web }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">{{ __('Coordinates') }}:</td>
                                        <td class="px-2 py-1"><a href="{{ $club->coordinates }}"
                                                target="blank">{{ $club->coordinates }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">{{ __('Tags') }}:</td>
                                        <td class="px-2 py-1">
                                            @php
                                                $clubTags = [];
                                                foreach ($club->tags as $tag) {
                                                    $clubTags[] = $tag->name;
                                                }
                                            @endphp
                                            {{ implode(', ', $clubTags) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 py-1 font-semibold">{{ __('Turkish Riding Federation Link') }}:</td>
                                        <td class="px-2 py-1">
                                            {{ $club->tbf_link }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-lg font-bold text-gray-800">
                                {{ __('Members') }}
                            </h4>

                            @if (count($club->members) > 0)
                                <table class="table-fixed w-full border border-slate-300 mt-6">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                                {{ __('Name') }}</th>
                                            <th
                                                class="px-4 py-2 bg-slate-100 border border-slate-300 hidden md:table-cell">
                                                {{ __('E-mail') }}</th>
                                            <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                                {{ __('Type') }}</th>
                                            <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                                &nbsp;</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($club->members as $member)
                                            <tr>
                                                <td class="px-4 py-2 border border-slate-200">{{ $member->name }}</td>
                                                <td class="px-4 py-2 border border-slate-200 hidden md:table-cell">
                                                    {{ $member->email }}</td>
                                                <td class="px-4 py-2 border border-slate-200">
                                                    {{ \App\Models\User::$type[$member->type] }}</td>
                                                <td class="px-4 py-2 border border-slate-200 text-center">
                                                    @if ($member->type === 'student')
                                                        <x-link-button :href="route('clubs.lesson-rights.create', [
                                                            $club,
                                                            'member' => $member->id,
                                                        ])">
                                                            {{ __('Lesson Rights') }}
                                                        </x-link-button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="rounded-md border border-dashed border-slate-300 mt-6 p-8">
                                    <div class="text-center font-medium">
                                        {{ __('No members yet.') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mt-6">
                            <h4 class="text-lg font-bold text-gray-800">
                                {{ __('Horses') }}
                            </h4>

                            @if (count($club->horses) > 0)
                                <table class="table-fixed w-full border border-slate-300 mt-6">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                                {{ __('Name') }}</th>
                                            <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                                {{ __('Gender') }}</th>
                                            <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                                {{ __('Race') }}</th>
                                            <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                                {{ __('FEI ID') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($club->horses as $horse)
                                            <tr>
                                                <td class="px-4 py-2 border border-slate-200">{{ $horse->name }}</td>
                                                <td class="px-4 py-2 border border-slate-200">
                                                    {{ \App\Models\Horse::$gender[$horse->gender] }}</td>
                                                <td class="px-4 py-2 border border-slate-200">{{ $horse->race }}</td>
                                                <td class="px-4 py-2 border border-slate-200">{{ $horse->fei_id }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="rounded-md border border-dashed border-slate-300 mt-6 p-8">
                                    <div class="text-center font-medium">
                                        {{ __('No horses yet.') }}
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
