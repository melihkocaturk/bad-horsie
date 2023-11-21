<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="['Clubs' => route('clubs.index')]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add New Club') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('clubs.store') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name')" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Description -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea id="description" name="description" type="text" class="mt-1 block w-full"
                                    :value="old('description')" />
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
                                    :value="old('address')" maxlength="191" />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    :value="old('phone')" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <!-- E-mail -->
                            <div>
                                <x-input-label for="email" :value="__('E-mail')" />
                                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                                    :value="old('email')" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Web -->
                            <div>
                                <x-input-label for="web" :value="__('Web')" />
                                <x-text-input id="web" name="web" type="text" class="mt-1 block w-full"
                                    :value="old('web')" />
                                <x-input-error class="mt-2" :messages="$errors->get('web')" />
                            </div>

                            <!-- Coordinates -->
                            <div>
                                <x-input-label for="coordinates" :value="__('Coordinates')" />
                                <x-text-input id="coordinates" name="coordinates" type="text"
                                    class="mt-1 block w-full" :value="old('coordinates')" />
                                <x-input-error class="mt-2" :messages="$errors->get('coordinates')" />
                            </div>

                            <!-- Tags -->
                            <div>
                                <x-input-label :value="__('Tags')" />
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach ($tags as $tag)
                                        <label class="inline-flex items-center">
                                            <input type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                name="tags[]" value="{{ $tag->id }}">
                                            <span class="ml-2 text-sm text-gray-600">{{ $tag->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('tags')" />
                            </div>

                            <!-- Türkiye Binicilik Federasyonu -->
                            <div>
                                <x-input-label for="tbf_link" :value="__('Türkiye Binicilik Federasyonu Linki')" />
                                <x-text-input id="tbf_link" name="tbf_link" type="text" class="mt-1 block w-full"
                                    :value="old('tbf_link')" />
                                <x-input-error class="mt-2" :messages="$errors->get('tbf_link')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
