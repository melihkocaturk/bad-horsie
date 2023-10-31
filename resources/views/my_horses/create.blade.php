<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Horses') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Add New Horse') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('my-horses.store') }}" class="mt-6 space-y-6"
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
                                    :value="old('description')" maxlength="191" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <!-- Avatar -->
                            <div>
                                <x-input-label for="avatar" :value="__('Avatar')" />
                                <x-text-input id="avatar" name="avatar" type="file" class="mt-1" />
                                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                            </div>

                            <!-- Gender -->
                            <div>
                                <x-input-label for="gender" :value="__('Gender')" />
                                <x-select-box id="gender" class="block mt-1" name="gender" :options="\App\Models\MyHorse::$gender"
                                    :value="old('gender')" />
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>

                            <!-- Race -->
                            <div>
                                <x-input-label for="race" :value="__('Race')" />
                                <x-text-input id="race" name="race" type="text" class="mt-1 block w-full"
                                    :value="old('race')" />
                                <x-input-error class="mt-2" :messages="$errors->get('race')" />
                            </div>

                            <!-- Color -->
                            <div>
                                <x-input-label for="color" :value="__('Color')" />
                                <x-text-input id="color" name="color" type="text" class="mt-1 block w-full"
                                    :value="old('color')" />
                                <x-input-error class="mt-2" :messages="$errors->get('color')" />
                            </div>

                            <!-- Height -->
                            <div>
                                <x-input-label for="height" :value="__('Height')" />
                                <x-text-input id="height" name="height" type="text" class="mt-1 block w-full"
                                    :value="old('height')" />
                                <x-input-error class="mt-2" :messages="$errors->get('height')" />
                            </div>

                            <!-- FEI ID -->
                            <div>
                                <x-input-label for="fei_id" :value="__('FEI ID')" />
                                <x-text-input id="fei_id" name="fei_id" type="text" class="mt-1 block w-full"
                                    :value="old('fei_id')" />
                                <x-input-error class="mt-2" :messages="$errors->get('fei_id')" />
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
