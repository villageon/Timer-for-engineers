<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('ランキング') }}
        </h2>
    </x-slot>

    {{-- 期間 --}}
    <div class="pt-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="flex justify-center px-6 bg-white">

                    <form action="{{ route('rank') }}" method="get">
                        <input type="hidden" name="date" value="year">
                        <button type="submit"
                            class="mx-auto text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-red-700 rounded">今年</button>
                    </form>

                    <form action="{{ route('rank') }}" method="get">
                        <input type="hidden" name="date" value="month">
                        <button type="submit"
                            class="mx-auto text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-red-700 rounded">今月</button>
                    </form>

                    <form action="{{ route('rank') }}" method="get">
                        <input type="hidden" name="date" value="day">
                        <button type="submit"
                            class="mx-auto text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-red-700 rounded">今日</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">

                    {{-- 表示期間 --}}
                    <div class="mt-10 flex justify-center">
                        @if ($date === 'year')
                            <span
                                class="text-2xl text-red-800 border border-4 font-bold border-red-800 py-1 px-10 md:px-15 rounded-lg">年間</span>
                        @elseif($date === 'month')
                            <span
                                class="text-2xl text-red-800 border border-4 font-bold border-red-800 py-1 px-10 md:px-15 rounded-lg">今月</span>
                        @elseif($date === 'day')
                            <span
                                class="text-2xl text-red-800 border border-4 font-bold border-red-800 py-1 px-10 md:px-15 rounded-lg">今日</span>
                        @endif
                    </div>

                    {{-- 15分用 --}}
                    <x-rank type="{{ \Constant::MINUTES['fifteen'] }}" :date="$date" :oneToThree="$fifOneToThree" :fourToTwelve="$fifFourToTwelve"/>

                    {{-- 30分用 --}}
                    <x-rank type="{{ \Constant::MINUTES['thirty'] }}" :date="$date" :oneToThree="$thiOneToThree" :fourToTwelve="$thiFourToTwelve"/>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
