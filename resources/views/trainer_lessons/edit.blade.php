<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lessons') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="['Lessons' => route('trainer-lessons.index')]" />

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
                                    <td class="px-6 py-3 font-semibold">Club:</td>
                                    <td class="px-6 py-3">{{ $lesson->club->name }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">Start:</td>
                                    <td class="px-6 py-3">{{ $lesson->start }}</td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">End:</td>
                                    <td class="px-6 py-3">{{ $lesson->end }} cm</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">Student:</td>
                                    <td class="px-6 py-3">
                                        <span class="float-left">{{ $lesson->student->name }} &nbsp;</span>
                                        @if ($lesson->student_confirmation)
                                            <x-approve-icon></x-approve-icon>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">Confirmation:</td>
                                    <td class="px-6 py-3">
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
                                    <td class="px-6 py-3 font-semibold">Reason For Reject:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->reason_for_reject }}
                                    </td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">Grade:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->grade }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">Comment:</td>
                                    <td class="px-6 py-3">
                                        {{ $lesson->comment }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>

            @if (null === $lesson->trainer_confirmation)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Approve Lesson') }}
                                </h2>
                            </header>
                            <form method="post" action="{{ route('trainer-lessons.update', $lesson) }}"
                                class="mt-6 space-y-6">
                                @csrf
                                @method('PUT')

                                <!-- Confirmation -->
                                <div>
                                    <label for="approve" class="inline-flex items-center">
                                        <input id="approve" type="radio"
                                            class="rounded border-green-300 text-green-600 shadow-sm focus:ring-green-500"
                                            name="trainer_confirmation" value="1">
                                        <span class="ml-2 text-green-600">{{ __('Approve') }}</span>
                                    </label>
                                    &nbsp;
                                    <label for="reject" class="inline-flex items-center">
                                        <input id="reject" type="radio"
                                            class="rounded border-red-300 text-red-600 shadow-sm focus:ring-red-500"
                                            name="trainer_confirmation" value="0">
                                        <span class="ml-2 text-red-600">{{ __('Reject') }}</span>
                                    </label>
                                    <x-input-error class="mt-2" :messages="$errors->get('trainer_confirmation')" />
                                </div>

                                <!-- Reason For Reject -->
                                <div>
                                    <x-input-label for="reason_for_reject" :value="__('Reason For Reject')" />
                                    <x-textarea id="reason_for_reject" name="reason_for_reject" type="text"
                                        class="mt-1 block w-full" :value="old('reason_for_reject')" />
                                    <x-input-error class="mt-2" :messages="$errors->get('reason_for_reject')" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            @endif

            @if ($lesson->trainer_confirmation)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Student Grade') }}
                                </h2>
                            </header>

                            <form method="post" action="{{ route('trainer-lessons.update', $lesson) }}"
                                class="mt-6 space-y-6">
                                @csrf
                                @method('PUT')

                                <!-- Horse -->
                                @php
                                    $options = [];
                                    foreach ($clubHorses as $horse) {
                                        $options += [$horse->id => $horse->name];
                                    }
                                    foreach ($studentHorses as $horse) {
                                        $options += [$horse->id => $horse->name];
                                    }
                                @endphp

                                <div>
                                    <x-input-label for="horse_id" :value="__('Horse')" />
                                    <x-select-box id="horse_id" class="block mt-1" name="horse_id" :options="$options"
                                        :selected="$lesson->horse_id" />
                                    <x-input-error :messages="$errors->get('horse_id')" class="mt-2" />
                                </div>

                                <!-- Grade -->
                                <div>
                                    <x-input-label for="grade" :value="__('Grade')" />
                                    <x-select-box id="grade" class="block mt-1" name="grade" :options="[1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5]"
                                        :selected="$lesson->grade" autofocus />
                                    <x-input-error :messages="$errors->get('grade')" class="mt-2" />
                                </div>

                                <!-- Comment -->
                                <div>
                                    <x-input-label for="comment" :value="__('Comment')" />
                                    <x-textarea id="comment" name="comment" type="text" class="mt-1 block w-full"
                                        :value="$lesson->comment" />
                                    <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
