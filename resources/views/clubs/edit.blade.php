<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

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
