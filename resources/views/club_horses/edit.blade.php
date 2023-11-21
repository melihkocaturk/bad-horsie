<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horses') }}
        </h2>
    </x-slot>

    <!-- Breadcrumbs -->
    <x-breadcrumbs :links="[
        'Clubs' => route('clubs.index'),
        $club->name => route('clubs.show', $club),
        'Horses' => route('clubs.horses.index', $club),
    ]" />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Horse') }}
                            </h2>
                        </header>

                        <form method="post" action="{{ route('clubs.horses.update', ['club' => $club, 'horse' => $horse]) }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="$horse->name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Description -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea id="description" name="description" type="text" class="mt-1 block w-full"
                                    :value="$horse->description" maxlength="191" />
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
                                <x-select-box id="gender" class="block mt-1" name="gender" :options="\App\Models\Horse::$gender"
                                    :selected="$horse->gender" />
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>

                            <!-- Race -->
                            <div>
                                <x-input-label for="race" :value="__('Race')" />
                                <x-text-input id="race" name="race" type="text" class="mt-1 block w-full"
                                    :value="$horse->race" />
                                <x-input-error class="mt-2" :messages="$errors->get('race')" />
                            </div>

                            <!-- Color -->
                            <div>
                                <x-input-label for="color" :value="__('Color')" />
                                <x-text-input id="color" name="color" type="text" class="mt-1 block w-full"
                                    :value="$horse->color" />
                                <x-input-error class="mt-2" :messages="$errors->get('color')" />
                            </div>

                            <!-- Height -->
                            <div>
                                <x-input-label for="height" :value="__('Height')" />
                                <x-text-input id="height" name="height" type="text" class="mt-1 block w-full"
                                    :value="$horse->height" />
                                <x-input-error class="mt-2" :messages="$errors->get('height')" />
                            </div>

                            <!-- FEI ID -->
                            <div>
                                <x-input-label for="fei_id" :value="__('FEI ID')" />
                                <x-text-input id="fei_id" name="fei_id" type="text" class="mt-1 block w-full"
                                    :value="$horse->fei_id" />
                                <x-input-error class="mt-2" :messages="$errors->get('fei_id')" />
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

                    <form method="post" action="{{ route('clubs.horses.destroy', ['club' => $club, 'horse' => $horse]) }}" class="pt-6">
                        @csrf
                        @method('delete')
                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
