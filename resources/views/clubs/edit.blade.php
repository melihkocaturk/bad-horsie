<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[
        __('Clubs') => route('clubs.index'),
        $club->name => route('clubs.show', $club),
    ]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Club') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('clubs.update', $club) }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="$club->name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Description -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea id="description" name="description" type="text" class="mt-1 block w-full"
                                    :value="$club->description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <!-- Logo -->
                            <div>
                                <x-input-label for="logo" :value="__('Logo')" />
                                <x-text-input id="logo" name="logo" type="file" class="mt-1" />
                                <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                            </div>

                            <!-- Banner -->
                            <div>
                                <x-input-label for="banner" :value="__('Banner')" />
                                <x-text-input id="banner" name="banner" type="file" class="mt-1" />
                                <x-input-error class="mt-2" :messages="$errors->get('banner')" />
                            </div>

                            <!-- Address -->
                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-textarea id="address" name="address" type="text" class="mt-1 block w-full"
                                    :value="$club->address" maxlength="191" />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    :value="$club->phone" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <!-- E-mail -->
                            <div>
                                <x-input-label for="email" :value="__('E-mail')" />
                                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                                    :value="$club->email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Web -->
                            <div>
                                <x-input-label for="web" :value="__('Web')" />
                                <x-text-input id="web" name="web" type="text" class="mt-1 block w-full"
                                    :value="$club->web" />
                                <x-input-error class="mt-2" :messages="$errors->get('web')" />
                            </div>

                            <!-- Coordinates -->
                            <div>
                                <x-input-label for="coordinates" :value="__('Coordinates')" />
                                <x-text-input id="coordinates" name="coordinates" type="text"
                                    class="mt-1 block w-full" :value="$club->coordinates" />
                                <x-input-error class="mt-2" :messages="$errors->get('coordinates')" />
                            </div>

                            <!-- Tags -->
                            <div>
                                <x-input-label :value="__('Tags')" />
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @php
                                        $clubTags = [];
                                        foreach ($club->tags as $tag) {
                                            $clubTags[] = $tag->id;
                                        }
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <label class="inline-flex items-center">
                                            <input type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                name="tags[]" value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $clubTags) ? 'checked' : '' }}>
                                            <span class="ml-2 text-sm text-gray-600">{{ $tag->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('tags')" />
                            </div>

                            <!-- Türkiye Binicilik Federasyonu -->
                            <div>
                                <x-input-label for="tbf_link" :value="__('Turkish Riding Federation Link')" />
                                <x-text-input id="tbf_link" name="tbf_link" type="text" class="mt-1 block w-full"
                                    :value="$club->tbf_link" />
                                <x-input-error class="mt-2" :messages="$errors->get('tbf_link')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Members') }}
                            </h2>
                        </header>
                    </section>

                    <form method="post" action="{{ route('clubs.member.store', $club) }}" class="mt-6 space-y-6">
                        @csrf

                        <!-- E-mail -->
                        <div>
                            <x-input-label for="email" :value="__('E-mail')" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Add') }}</x-primary-button>
                        </div>
                    </form>
                </div>

                @if (count($club->members) > 0)
                    <table class="table-fixed w-full border border-slate-300 mt-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Name') }}</th>
                                <th class="px-4 py-2 bg-slate-100 border border-slate-300 hidden md:table-cell">
                                    {{ __('E-mail') }}</th>
                                <th class="px-4 py-2 bg-slate-100 border border-slate-300">{{ __('Type') }}</th>
                                <th class="px-4 py-2 bg-slate-100 border border-slate-300">&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($club->members as $member)
                                <tr>
                                    <td class="px-4 py-2 border border-slate-200">{{ $member->name }}</td>
                                    <td class="px-4 py-2 border border-slate-200 hidden md:table-cell">
                                        {{ $member->email }}</td>
                                    <td class="px-4 py-2 border border-slate-200">
                                        {{ \App\Models\User::$type[$member->type] }}</td>
                                    <td class="px-4 py-2 border border-slate-200 relative text-center">
                                        <form method="post"
                                            action="{{ route('clubs.member.destroy', ['club' => $club, 'member' => $member]) }}">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button>{{ __('Remove') }}</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Delete') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Are you sure you want to delete?') }}
                            </p>
                        </header>
                    </section>

                    <form method="post" action="{{ route('clubs.destroy', $club) }}" class="pt-6">
                        @csrf
                        @method('delete')
                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
