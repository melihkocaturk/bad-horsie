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
                        @if (count($lessons) > 0)
                            <table class="table-fixed w-full border border-slate-300">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Club') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Lesson') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Start') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('End') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Trainer') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                            {{ __('Confirmation') }}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        <tr>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->club->name }}</td>
                                            <td class="px-4 py-2 border border-slate-200">
                                                <a href="{{ route('student-lessons.show', $lesson) }}"
                                                    class="text-blue-600">{{ $lesson->name }}</a>
                                            </td>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->start }}</td>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->end }}</td>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->trainer->name }}
                                            </td>
                                            <td class="px-4 py-2 border border-slate-200 relative text-center">
                                                @if ($lesson->student_confirmation)
                                                    <div class="flex justify-center items-center">
                                                        <x-approve-icon></x-approve-icon>
                                                    </div>
                                                @else
                                                    <form method="post"
                                                        action="{{ route('student-lessons.update', $lesson) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="student_confirmation"
                                                            value="1">
                                                        <x-primary-button class="bg-green-600">{{ __('Done') }}</x-primary-button>
                                                    </form>
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
