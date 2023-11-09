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
    ]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <x-link-button :href="route('clubs.lessons.create', $club)">
                            Add New Lesson
                        </x-link-button>

                        @if (count($club->lessons) > 0)
                            <table class="table-fixed w-full border border-slate-300 mt-6">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Lesson') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Start') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('End') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Trainer') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Student') }}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($club->lessons as $lesson)
                                        <tr>
                                            <td class="px-4 py-2 border border-slate-200">
                                                <a href="{{ route('clubs.lessons.show', ['club' => $club, 'lesson' => $lesson]) }}"
                                                    class="text-blue-600">{{ $lesson->name }}</a>
                                            </td>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->start }}</td>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->end }}</td>
                                            <td class="px-4 py-2 border border-slate-200">
                                                <span class="float-left">{{ $lesson->trainer->name }} &nbsp;</span>
                                                @if (isset($lesson->trainer_confirmation))
                                                    @if ($lesson->trainer_confirmation)
                                                        <x-approve-icon></x-approve-icon>
                                                    @else
                                                        <x-reject-icon></x-reject-icon>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 border border-slate-200">
                                                <span class="float-left">{{ $lesson->student->name }} &nbsp;</span>
                                                @if ($lesson->student_confirmation)
                                                    <x-approve-icon></x-approve-icon>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
