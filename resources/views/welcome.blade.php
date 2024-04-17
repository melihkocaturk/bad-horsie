<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @foreach ($available_locales as $locale_name => $available_locale)
                    @if ($available_locale != $current_locale)
                        <a href="language/{{ $available_locale }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ $locale_name }}</a>
                    @endif
                @endforeach

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Dashboard') }}</a>
                @else
                    <a href="{{ route('login') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Log in') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-semibold rounded-lg text-sm px-5 py-2.5 me-2 mb-2">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-5xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="{{ asset('logo.png') }}" alt="{{ config('app.name') }}">
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <a href="{{ route('register') }}"
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="w-full text-center">
                            <div class="mx-auto h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900">Derslerini Planla</h2>

                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Aylık, haftalık veya günlük ders planı oluşturun. Antrenör ve öğrencilere bildirim
                                gönderilsin. Yapılan dersler öğrencinin paketinden otomatik olarak düşsün.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('register') }}"
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="w-full text-center">
                            <div class="mx-auto h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                    <path stroke-linecap="round"
                                        d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.3-.6-1-1-1.6-1H7.6c-.7 0-1.3.4-1.6 1M4 5h16c.6 0 1 .4 1 1v12c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900">Atlarına Profil
                                Oluştur</h2>

                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Tüm kulüp atlarına profil oluşturabilir, bilgilerini düzenleyebilirsiniz. Atlarınızın
                                kaç saat çalıştığını ve kaç ders yaptığını kaydedebilirsiniz. Hangi öğrencinin hangi at
                                ile derse gireceğini eşleştirerek program oluşturabilirsiniz.
                            </p>
                        </div>
                    </a>

                    <a href="{{ route('register') }}"
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="w-full text-center">
                            <div class="mx-auto h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                    <path stroke-linecap="round"
                                        d="M7.6 8.5h8m-8 3.5H12m7.1-7H5c-.2 0-.5 0-.6.3-.2.1-.3.3-.3.6V15c0 .3 0 .5.3.6.1.2.4.3.6.3h4l3 4 3-4h4.1c.2 0 .5 0 .6-.3.2-.1.3-.3.3-.6V6c0-.3 0-.5-.3-.6a.9.9 0 0 0-.6-.3Z" />
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900">Bildirimlerini Aç
                            </h2>

                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Atınızın tüm sağlık verileri, nal çakım zamanları, aşı takvimi, beslenme rasyonu ve daha
                                fazlasının kaydını tutabilirsiniz. Etkinlik takvimi ile dilediğiniz zaman bildirim alır,
                                önemli günleri unutmazsınız.
                            </p>
                        </div>
                    </a>

                    <div
                        class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="w-full text-center">
                            <div class="mx-auto h-16 w-16 bg-red-50 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                    <path fill-rule="evenodd"
                                        d="M5 4c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4Zm12 12V5H7v11h10Zm-5 1a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900">Uygulamayı İndir</h2>

                            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                Sen de aramıza katıl! Mobil uygulamamızı indirerek, güncellemelerden anında
                                haberdar olabilir ve favori içeriklerini her zaman yanında
                                taşırsın. Hızlı, pratik ve kullanıcı dostu arayüzümüzle hayatını kolaylaştır.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('user-agreement') }}" target="blank"
                            class="hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Kullanıcı Sözleşmesi
                        </a>

                        <a href="{{ route('kvkk') }}" target="blank"
                            class="hover:text-gray-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            KVKK Metni
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500">
                    © {{ Carbon\Carbon::now()->year }} AtClub.
                </div>
            </div>
        </div>
    </div>
</body>

</html>
