<x-guest-layout>
    <div class="h-screen bg-gradient-to-r from-teal-200 via-teal-400 to-teal-500">
        <div class="">

            <section class="text-gray-600 body-font max-w-7xl mx-auto py-24">
                <div class="container md:flex justify-around items-center py-24">
                    <div class="w-1/2 md:w-1/3 mb-10 md:mb-0 mx-auto">
                        <x-application-logo />
                    </div>
                    <div class="text-center md:w-1/2">
                        <h1 class="title-font sm:text-4xl text-3xl mb-10 font-medium text-white">Timer for engineers</h1>
                        <div class="flex justify-center items-end">
                            @if (Route::has('login'))
                                <div class="">
                                    @auth
                                        <a href="{{ url('/dashboard') }}">
                                            <button type="button"
                                                class="mx-auto text-white bg-green-500 border-0 py-2 px-4 md:px-8 focus:outline-none hover:bg-green-700 rounded">ホーム</button>
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}">
                                            <button type="button"
                                                class="mx-auto text-white bg-green-500 border-0 py-2 px-4 md:px-8 mr-5 focus:outline-none hover:bg-green-700 rounded">ログイン</button>
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">
                                                <button type="button"
                                                    class="mx-auto text-white bg-green-600 border-0 py-2 px-4 md:px-8  focus:outline-none hover:bg-green-700 rounded">登録</button>
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-guest-layout>
