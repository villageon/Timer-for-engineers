<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ランキング') }}
        </h2>
    </x-slot>

    {{-- 期間 --}}
    <div class="pt-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center px-6 bg-white border-b border-gray-200">

                    <form action="{{ route('rank') }}" method="get">
                        <input type="hidden" name="date" value="year">
                        <button type="submit"
                            class="mx-auto text-white bg-red-800 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-red-700 rounded">今年</button>
                    </form>

                    <form action="{{ route('rank') }}" method="get">
                        <input type="hidden" name="date" value="month">
                        <button type="submit"
                            class="mx-auto text-white bg-red-800 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-red-700 rounded">今月</button>
                    </form>

                    <form action="{{ route('rank') }}" method="get">
                        <input type="hidden" name="date" value="day">
                        <button type="submit"
                            class="mx-auto text-white bg-red-800 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-red-700 rounded">今日</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- 表示期間 --}}
                    <div class="mt-10 flex justify-center">
                        @if($date === 'year')
                        <span class="text-2xl text-red-800 border border-4 font-bold border-red-800 py-1 px-10 md:px-15 rounded-lg">年間</span>
                        @elseif($date === 'month')
                        <span class="text-2xl text-red-800 border border-4 font-bold border-red-800 py-1 px-10 md:px-15 rounded-lg">今月</span>
                        @elseif($date === 'day')
                        <span class="text-2xl text-red-800 border border-4 font-bold border-red-800 py-1 px-10 md:px-15 rounded-lg">今日</span>
                        @endif
                    </div>

                    {{-- 15分用 --}}
                    <section class="text-gray-600 body-font">
                        <div class="container py-10 border-b border-gray-800">
                            <div class="mb-10 text-center">
                                <button type="button"
                                    class="flex-shrink-0 text-white bg-green-800 border-0 py-2 px-4 md:px-8 focus:outline-none hover:bg-green-600 rounded text-lg ">15分のランキング</button>
                            </div>
                        <div class="md:flex">
                            <div class="md:w-3/5 lg:w-1/2">
                                {{-- 1~3位 --}}
                                @foreach($fifOneToThree as $index => $value)
                                <div class="mb-2 md:mb-5 lg:mb-8 lg:px-10">
                                    <h2 class="lg:mb-2 text-3xl md:text-4xl lg:text-5xl">{{ $index + 1 }}位</h2>
                                    <div class="flex items-center border-gray-400 border px-4 py-2 rounded-lg">
                                        <div class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4 md:mr-10 overflow-hidden">
                                            <x-thumbnail filename="{{ $value['image']['icon'] ?? ''}}" type="icon" />
                                        </div>
                                        <div class="flex flex-auto items-center">
                                            <h2 class="text-lg md:text-2xl lg:text-xl text-gray-900 title-font font-medium mr-3 md:mr-10">{{ $value['user']['name'] }}</h2>
                                            <p class="text-xl md:text-3xl lg:text-2xl text-red-900">
                                                @if($date === 'year')
                                                {{ $value['fif_all'] }}%
                                                @elseif($date === 'month')
                                                {{ $value['fif_month'] }}%
                                                @elseif($date === 'day')
                                                {{ $value['fif_day'] }}%
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- 4位~10位 --}}
                            <div class="md:w-2/5 lg:w-1/2">
                                <div class="">
                                    @foreach($fifFourToTwelve as $index => $value)
                                    <div class="mt-8 px-10 md:px-5 lg:px-10">
                                        <div class="flex items-center border-b border-gray-200">
                                            <div class="flex shrink-0">
                                                <h2 class="text-xl md:text-2xl lg:text-3xl mr-3 lg:mr-5">{{ $index + 4 }}位</h2>
                                            </div>
                                            <div class="flex">
                                                <div class="flex items-center">
                                                    <h2 class="text-md md:text-lg lg:text-xl text-gray-900 title-font font-medium mr-3 lg:mr-5">{{ $value['user']['name'] }}</h2>
                                                    <p class="text-lg md:text-xl lg:text-2xl text-red-900">
                                                        @if($date === 'year')
                                                        {{ $value['fif_all'] }}%
                                                        @elseif($date === 'month')
                                                        {{ $value['fif_month'] }}%
                                                        @elseif($date === 'day')
                                                        {{ $value['fif_day'] }}%
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        </div>
                    </section>

                    {{-- 30分用 --}}
                    <section class="text-gray-600 body-font">
                        <div class="container py-10 border-b border-gray-800">
                            <div class="mb-10 text-center">
                                <button type="button"
                                    class="flex-shrink-0 text-white bg-green-800 border-0 py-2 px-4 md:px-8 focus:outline-none hover:bg-green-600 rounded text-lg ">30分のランキング</button>
                            </div>
                        <div class="md:flex">
                            <div class="md:w-3/5 lg:w-1/2">
                                {{-- 1~3位 --}}
                                @foreach($thiOneToThree as $index => $value)
                                <div class="mb-2 md:mb-5 lg:mb-8 lg:px-10">
                                    <h2 class="lg:mb-2 text-3xl md:text-4xl lg:text-5xl">{{ $index + 1 }}位</h2>
                                    <div class="flex items-center border-gray-400 border px-4 py-2 rounded-lg">
                                        <div class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4 md:mr-10 overflow-hidden">
                                            <x-thumbnail filename="{{ $value['image']['icon'] ?? ''}}" type="icon" />
                                        </div>
                                        <div class="flex flex-auto items-center">
                                            <h2 class="text-lg md:text-2xl lg:text-xl text-gray-900 title-font font-medium mr-3 md:mr-10">{{ $value['user']['name'] }}</h2>
                                            <p class="text-xl md:text-3xl lg:text-2xl text-red-900">
                                                @if($date === 'year')
                                                {{ $value['thi_all'] }}%
                                                @elseif($date === 'month')
                                                {{ $value['thi_month'] }}%
                                                @elseif($date === 'day')
                                                {{ $value['thi_day'] }}%
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- 4位~10位 --}}
                            <div class="md:w-2/5 lg:w-1/2">
                                <div class="">
                                    @foreach($thiFourToTwelve as $index => $value)
                                    <div class="mt-8 px-10 md:px-5 lg:px-10">
                                        <div class="flex items-center border-b border-gray-200">
                                            <div class="flex shrink-0">
                                                <h2 class="text-xl md:text-2xl lg:text-3xl mr-3 lg:mr-5">{{ $index + 4 }}位</h2>
                                            </div>
                                            <div class="flex">
                                                <div class="flex items-center">
                                                    <h2 class="text-md md:text-lg lg:text-xl text-gray-900 title-font font-medium mr-3 lg:mr-5">{{ $value['user']['name'] }}</h2>
                                                    <p class="text-lg md:text-xl lg:text-2xl text-red-900">
                                                        @if($date === 'year')
                                                        {{ $value['thi_all'] }}%
                                                        @elseif($date === 'month')
                                                        {{ $value['thi_month'] }}%
                                                        @elseif($date === 'day')
                                                        {{ $value['thi_day'] }}%
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
