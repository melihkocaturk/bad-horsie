<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lesson Rights') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[
        'Clubs' => route('clubs.index'),
        $club->name => route('clubs.show', $club),
    ]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add New Lesson Right') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('clubs.lesson-rights.store', $club) }}"
                            class="mt-6 space-y-6">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                            <!-- User -->
                            <div>
                                <x-input-label :value="__('User')" />
                                <x-text-input type="text" class="mt-1 block w-full" :value="$user->name"
                                    :disabled="true" />
                            </div>

                            <!-- Token -->
                            <div>
                                <x-input-label for="token" :value="__('Token')" />
                                <x-text-input id="token" name="token" type="text" class="mt-1 block w-full"
                                    :value="old('token')" placeholder="{{ $token }} + " />
                                <x-input-error class="mt-2" :messages="$errors->get('token')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Add') }}</x-primary-button>
                            </div>
                        </form>

                        <table class="table-fixed w-full border border-slate-300 mt-6">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('ID') }}
                                    </th>
                                    <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Token') }}
                                    </th>
                                    <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Created At') }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td class="px-4 py-2 border border-slate-200">{{ $log->id }}</td>
                                        <td class="px-4 py-2 border border-slate-200">{{ $log->token }}</td>
                                        <td class="px-4 py-2 border border-slate-200">{{ $log->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
