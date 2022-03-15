<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('成績') }}
        </h2>
    </x-slot>

    {{-- 期間 --}}
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center px-6 bg-white border-b border-gray-200">

                    <form action="{{ route('timerHistory') }}" method="get">
                        <input type="hidden" name="date" value="year">
                        <button type="submit"
                            class="mx-auto text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-green-700 rounded">今年</button>
                    </form>

                    <form action="{{ route('timerHistory') }}" method="get">                    
                        <input type="hidden" name="date" value="month">
                        <button type="submit"
                        class="mx-auto text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-green-700 rounded">今月</button>
                    </form>
                    
                    <form action="{{ route('timerHistory') }}" method="get">
                     
                        <input type="hidden" name="date" value="day">
                        <button type="submit"
                        class="mx-auto text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-green-700 rounded">今日</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- 表示期間 --}}
                    <div class="mt-10 flex justify-center">
                        @if($date === 'year')
                        <span class="text-2xl text-green-800 border border-4 font-bold border-green-800 py-1 px-10 md:px-15 rounded-lg">今年</span>
                        @elseif($date === 'month')
                        <span class="text-2xl text-green-800 border border-4 font-bold border-green-800 py-1 px-10 md:px-15 rounded-lg">今月</span>
                        @elseif($date === 'day')
                        <span class="text-2xl text-green-800 border border-4 font-bold border-green-800 py-1 px-10 md:px-15 rounded-lg">今日</span>
                        @endif
                    </div>

                    {{-- 15分用 --}}
                    <x-history type="{{ \Constant::MINUTES['fifteen'] }}" :count="$fifCount" :winCount="$fifWinCount" :loseCount="$fifLoseCount" :history="$fifteen" />
                    
                    {{-- 30分用 --}}
                    <x-history type="{{ \Constant::MINUTES['thirty'] }}" :count="$thiCount" :winCount="$thiWinCount" :loseCount="$thiLoseCount" :history="$thirty" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
