<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horses') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[__('Horses') => route('horses.index')]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <x-link-button :href="route('horses.edit', $horse)">
                            {{ __('Edit') }}
                        </x-link-button>

                        <div class="grid sm:grid-cols-2 grid-cols-1 gap-6 mt-6">
                            <div>
                                <img class="w-full h-auto rounded-lg" src="{{ Storage::url($horse->avatar) }}"
                                    alt="{{ $horse->name }}">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    {{ $horse->name }}
                                </h3>
                                <p class="mt-1">{{ $horse->description }}</p>
                                <table class="table-fixed min-w-full mt-6">
                                    <tbody>
                                        <tr class="bg-slate-100">
                                            <td class="px-6 py-3 font-semibold">{{ __('Gender') }}:</td>
                                            <td class="px-6 py-3">{{ \App\Models\Horse::$gender[$horse->gender] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-3 font-semibold">{{ __('Race') }}:</td>
                                            <td class="px-6 py-3">{{ $horse->race }}</td>
                                        </tr>
                                        <tr class="bg-slate-100">
                                            <td class="px-6 py-3 font-semibold">{{ __('Color') }}:</td>
                                            <td class="px-6 py-3">{{ $horse->color }}</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-3 font-semibold">{{ __('Height') }}:</td>
                                            <td class="px-6 py-3">{{ $horse->height }} cm</td>
                                        </tr>
                                        <tr class="bg-slate-100">
                                            <td class="px-6 py-3 font-semibold">{{ __('FEI ID') }}:</td>
                                            <td class="px-6 py-3">{{ $horse->fei_id }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
