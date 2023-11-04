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
                        <x-link-button :href="route('clubs.lessons.edit', ['club' => $club, 'lesson' => $lesson])">
                            Edit
                        </x-link-button>

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
                                    <td class="px-6 py-3 font-semibold">Trainer:</td>
                                    <td class="px-6 py-3">{{ $lesson->trainer->name }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-3 font-semibold">Student:</td>
                                    <td class="px-6 py-3">{{ $lesson->student->name }}</td>
                                </tr>
                                <tr class="bg-slate-100">
                                    <td class="px-6 py-3 font-semibold">Comment:</td>
                                    <td class="px-6 py-3">{{ $lesson->comment }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
