<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Horses') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-none">
                    <section>
                        <x-link-button :href="route('my-horses.edit', $myHorse)">
                            Edit
                        </x-link-button>

                        <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
                            <div>
                                <img class="w-full h-auto rounded-lg" src="{{ asset('storage/' . $myHorse->avatar) }}"
                                    alt="{{ $myHorse->name }}">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    {{ $myHorse->name }}
                                </h3>
                                <p class="mt-1">{{ $myHorse->description }}</p>
                                <p class="mt-6">
                                    <strong>Gender:</strong> {{ \App\Models\myHorse::$gender[$myHorse->gender] }}<br>
                                    <strong>Race:</strong> {{ $myHorse->race }}<br>
                                    <strong>Color:</strong> {{ $myHorse->color }}<br>
                                    <strong>Height:</strong> {{ $myHorse->height }} cm<br>
                                    <strong>FEI ID:</strong> {{ $myHorse->fei_id }}
                                </p>
                            </div>
                        </div>

                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
