<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[
        __('Clubs') => route('clubs.index'),
        $club->name => route('clubs.show', $club),
        __('Lessons') => route('clubs.lessons.index', $club),
    ]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <x-link-button :href="route('clubs.lessons.edit', ['club' => $club, 'lesson' => $lesson])">
                            {{ __('Edit') }}
                        </x-link-button>

                        <table class="table-fixed min-w-full mt-6">
                            <tbody>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">{{ __('Start') }}:</td>
                                    <td class="px-6 py-3">{{ $lesson->start }}</td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">{{ __('End') }}:</td>
                                    <td class="px-6 py-3">{{ $lesson->end }} cm</td>
                                </tr class="bg-slate-100">
                                <tr>
                                    <td class="px-6 py-3 font-semibold">{{ __('Student') }}:</td>
                                    <td class="px-6 py-3">
                                        <span class="float-left">{{ $lesson->student->name }} &nbsp;</span>
                                        @if ($lesson->student_confirmation)
                                            <x-approve-icon></x-approve-icon>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">{{ __('Trainer') }}:</td>
                                    <td class="px-6 py-3">
                                        <span class="float-left">{{ $lesson->trainer->name }} &nbsp;</span>
                                        @if (isset($lesson->trainer_confirmation))
                                            @if ($lesson->trainer_confirmation)
                                                <x-approve-icon></x-approve-icon>
                                            @else
                                                <x-reject-icon></x-reject-icon>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">{{ __('Reason For Reject') }}:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->reason_for_reject }}
                                    </td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">{{ __('Grade') }}:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->grade }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">{{ __('Comment') }}:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->comment }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
