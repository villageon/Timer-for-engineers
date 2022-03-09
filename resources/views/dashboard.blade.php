<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('タイマー') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div
                                class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                                <div
                                    class="sm:w-48 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center">
                                    <img src="{{ asset('images/fifteen.png')}}" alt="">
                                </div>
                                <div>
                                    <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">15分への挑戦
                                        </h2>
                                        <p class="leading-relaxed text-base">あなたは15分で課題を解決しなければいけない。挑戦するならスタートボタンを押してください。</p>
                                    </div>
                                    <div>
                                        <button type="button" onclick="location.href='{{ route('fif-timer.index') }}'"
                                            class="flex mx-auto text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 border-0 mt-5 py-2 px-8 focus:outline-none hover:bg-gradient-to-r from-green-500 via-green-600 to-green-700 rounded text-lg">準備</button>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                                <div>
                                    <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">30分への挑戦</h2>
                                        <p class="leading-relaxed text-base">あなたは30分で課題を解決しなければいけない。挑戦するならスタートボタンを押してください。</p>
                                    </div>
                                    <div>
                                        <button type="button" onclick="location.href='{{ route('thi-timer.index') }}'"
                                            class="flex mx-auto text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 border-0 mt-5 py-2 px-8 focus:outline-none hover:bg-gradient-to-r from-green-500 via-green-600 to-green-700 rounded text-lg">準備</button>
                                    </div>
                                </div>
                                <div
                                    class="sm:w-48 sm:order-none order-first sm:h-32 h-20 w-20 sm:ml-10 inline-flex items-center justify-center">
                                    <img src="{{ asset('images/thirty.png')}}" alt="">
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
