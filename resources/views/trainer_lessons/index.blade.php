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
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Lesson') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Club') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Start') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('End') }}
                                        </th>
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Student') }}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        <tr>
                                            <td class="px-4 py-2 border border-slate-200">
                                                <a href="{{ route('trainer-lessons.edit', $lesson) }}"
                                                    class="text-blue-600">{{ $lesson->name }}</a>
                                            </td>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->club->name }}</td>
                                            <td class="px-4 py-2 border border-slate-200">{{ Carbon\Carbon::parse($lesson->start)->format('d-m-Y H:i') }}</td>
                                            <td class="px-4 py-2 border border-slate-200">{{ Carbon\Carbon::parse($lesson->end)->format('d-m-Y H:i') }}</td>
                                            <td class="px-4 py-2 border border-slate-200">{{ $lesson->student->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="rounded-md border border-dashed border-slate-300 mt-6 p-8">
                                <div class="text-center font-medium">
                                    {{ __('No lessons yet.') }}
                                </div>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
