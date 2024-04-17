<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Schedule') }}
                            </h2>
                        </header>

                        <table class="table-fixed w-full border border-slate-300 mt-6">
                            <thead>
                                <tr>
                                    @for ($i = 0; $i <= 6; $i++)
                                        <th class="px-4 py-2 bg-slate-100 border border-slate-300">
                                            {{ __(date('D', strtotime("$i day"))) }}
                                        </th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i <= 6; $i++)
                                    <td class="px-4 py-2 border border-slate-200">
                                        @foreach ($events as $event)
                                            @if (
                                                    $event->start >=
                                                        Carbon\Carbon::now()->addDays($i)->toDateString() &&
                                                    $event->end <
                                                        Carbon\Carbon::now()->addDays($i + 1)->toDateString()
                                                )
                                                <div
                                                    class="bg-blue-600 text-white rounded p-1 text-sm mb-1 text-center">
                                                    {{ $event->name }} <br>
                                                    {{ Carbon\Carbon::parse($event->start)->format('H:i') }}
                                                    -
                                                    {{ Carbon\Carbon::parse($event->end)->format('H:i') }}
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                @endfor
                            </tbody>
                        </table>

                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
