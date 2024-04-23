<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lessons') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[__('Lessons') => route('student-lessons.index')]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ $lesson->name }}
                            </h2>
                        </header>

                        <table class="table-fixed min-w-full mt-6">
                            <tbody>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">{{ __('Club') }}:</td>
                                    <td class="px-6 py-3">{{ $lesson->club->name }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">{{ __('Start') }}:</td>
                                    <td class="px-6 py-3">{{ Carbon\Carbon::parse($lesson->start)->format('d-m-Y H:i') }}</td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">{{ __('End') }}:</td>
                                    <td class="px-6 py-3">{{ Carbon\Carbon::parse($lesson->end)->format('d-m-Y H:i') }}</td>
                                </tr class="bg-slate-100">
                                <tr>
                                    <td class="px-6 py-3 font-semibold">{{ __('Confirmation') }}:</td>
                                    <td class="px-6 py-3">
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
                                    <td class="px-6 py-3 font-semibold">{{ __('Horse') }}:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->horse ? $lesson->horse->name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">{{ __('Grade') }}:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->grade }}
                                    </td>
                                </tr>
                                <tr class="bg-slate-100">
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
