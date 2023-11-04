<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lessons') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Approve Lesson') }}
                            </h2>
                        </header>

                        <table class="table-fixed min-w-full mt-6">
                            <tbody>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">Name:</td>
                                    <td class="px-6 py-3">{{ $lesson->name }}</td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">Start:</td>
                                    <td class="px-6 py-3">{{ $lesson->start }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">End:</td>
                                    <td class="px-6 py-3">{{ $lesson->end }} cm</td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">Student:</td>
                                    <td class="px-6 py-3">
                                        <span class="float-left">{{ $lesson->student->name }} &nbsp;</span>
                                        @if ($lesson->student_confirmation)
                                            <x-approve-icon></x-approve-icon>
                                        @endif
                                    </td>
                                </tr>
                                @if (null === $lesson->trainer_confirmation)
                                    <form method="post" action="{{ route('trainer-lessons.update', $lesson) }}">
                                        @csrf
                                        @method('PUT')

                                        <tr>
                                            <td class="px-6 py-3 font-semibold">Confirmation:</td>
                                            <td class="px-6 py-3">
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
                                            </td>
                                        </tr>
                                        <tr class="bg-slate-100">
                                            <td class="px-6 py-3 font-semibold">Comment:</td>
                                            <td class="px-6 py-3">
                                                <!-- Comment -->
                                                <div>
                                                    <x-input-label for="comment" :value="__('Comment')" />
                                                    <x-textarea id="comment" name="comment" type="text"
                                                        class="mt-1 block w-full" :value="old('comment')" />
                                                    <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-3">&nbsp;</td>
                                            <td class="px-6 py-3">
                                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                            </td>
                                        </tr>
                                    </form>
                                @else
                                    <tr>
                                        <td class="px-6 py-3 font-semibold">Confirmation:</td>
                                        <td class="px-6 py-3">
                                            @if ($lesson->trainer_confirmation)
                                                <x-approve-icon></x-approve-icon>
                                            @else
                                                <x-reject-icon></x-approve-icon>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="bg-slate-100">
                                        <td class="px-6 py-3 font-semibold">Comment:</td>
                                        <td class="px-6 py-3">
                                            {{ $lesson->comment }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
