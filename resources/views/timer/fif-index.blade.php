<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('15分タイマー') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- フラッシュメッセージ --}}
                    <div id="flash">
                        <x-flash-message status="session('status')" />
                    </div>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto">
                            <div
                                class="flex items-center justify-center lg:w-3/5 mx-auto mb-10 border-gray-200 sm:flex-row flex-col">
                                <div class="sm:w-48 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center">
                                    <img id="timer" class="" src="{{ asset('images/fifteen.png') }}"
                                        alt="">
                                    <img id="warning-timer" class="hidden"
                                        src="{{ asset('images/fifteen-warning.png') }}" alt="">
                                    <img id="danger-timer" class="hidden"
                                        src="{{ asset('images/fifteen-danger.png') }}" alt="">
                                </div>
                                <div>
                                    <div class="flex-grow text-center mt-5">
                                        <h2 id="title" class="text-gray-900 text-lg title-font font-medium mb-2">
                                            15分間の勝負です!!</h2>
                                        <h2 id="warning-title"
                                            class="hidden text-yellow-800 text-lg title-font font-medium mb-2">残り5分です!!
                                        </h2>
                                        <h2 id="danger-title"
                                            class="hidden text-red-800 text-lg title-font font-medium mb-2">残り1分です!!
                                        </h2>
                                    </div>

                                    {{-- タイマー --}}
                                    <div class="mt-10 text-center">
                                        <p id="display" class="flex justify-center text-8xl text-green-800">15:00</p>
                                    </div>

                                    {{-- 失敗時の送信フォーム --}}
                                    <x-form type="{{ \Constant::MINUTES['fifteen'] }}" judge="{{ \Constant::JUDGE['loser'] }}" :menter="$menter"/>

                                    {{-- 成功時の送信フォーム --}}
                                    <x-form type="{{ \Constant::MINUTES['fifteen'] }}" judge="{{ \Constant::JUDGE['winner'] }}" :menter="$menter"/>

                                </div>
                            </div>
                            <x-timer-button />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ secure_asset('js/fif-timer.js') }}" defer></script>
    <script src="{{ secure_asset('js/flash.js') }}" defer></script>
</x-app-layout>
