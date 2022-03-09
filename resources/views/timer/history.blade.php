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
                            class="mx-auto text-white bg-green-800 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-green-700 rounded">今年</button>
                    </form>

                    <form action="{{ route('timerHistory') }}" method="get">                    
                        <input type="hidden" name="date" value="month">
                        <button type="submit"
                        class="mx-auto text-white bg-green-800 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-green-700 rounded">今月</button>
                    </form>
                    
                    <form action="{{ route('timerHistory') }}" method="get">
                     
                        <input type="hidden" name="date" value="day">
                        <button type="submit"
                        class="mx-auto text-white bg-green-800 border-0 my-5 py-2 px-4 md:px-8 mr-3 md:mr-5 focus:outline-none hover:bg-green-700 rounded">今日</button>
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
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto border-b border-gray-200">
                            <div class="lg:w-2/3 sm:flex justify-center items-center mx-auto mb-10 text-center">
                                <button
                                    class="flex-shrink-0 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-700 border-0 py-2 px-4 md:px-8 rounded text-lg">15分の戦歴</button>
                                <h1 class="flex flex-wrap justify-center text-5xl sm:text-7xl font-medium title-font text-gray-900 my-5 md:my-0 md:ml-10 ">
                                    <div class="mr-2">
                                        <span class="">{{ $fifCount }}<span class="text-lg">戦</span></span>
                                    </div>
                                    <div>
                                        <span class="mr-1">{{ $fifWinCount }}<span class="text-lg">勝</span></span>
                                        <span class="mr-1">{{ $fifLoseCount }}<span class="text-lg">敗</span></span>
                                    </div>
                                </h1>                      
                            </div>
                            {{-- コメントリスト --}}
                            @foreach ($fifteen as $fif)
                            <div>
                                <section class="text-gray-600 body-font">
                                    <div class="container">
                                      <div class="-m-4">
                                        <div class="p-4 lg:w-2/3 mx-auto">
                                            <a href="{{ route('detail', ['id' => $fif->id])}}">
                                                <div class="flex items-center bg-gray-100 bg-opacity-75 p-4 rounded-lg">
                                                  <div class="flex-shrink-0 title-font sm:text-2xl text-xl font-medium text-gray-900 mr-2 md:mr-5">
                                                      @if($fif->judge == \Constant::JUDGE['winner'] )
                                                        <span class="text-white bg-red-400 py-1 px-3 rounded-lg">勝ち</span>
                                                      @else
                                                        <span class="text-white bg-blue-400 py-1 px-3 rounded-lg">負け</span>
                                                      @endif
                                                  </div>
                                                  <div class="truncate">{{ $fif->comment }}</div>
                                                </div>
                                            </a>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                            </div>
                            @endforeach
                            <div class="mt-5 lg:w-2/3 mx-auto">
                                {{ $fifteen->appends([
                                  'date' => \Request::get('date'),
                                ])->links() }}
                            </div>
                        </div>
                    </section>

                    {{-- 30分用 --}}
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto border-b border-gray-200 mb-10">
                            <div class="lg:w-2/3 sm:flex justify-center items-center mx-auto mb-10 text-center">
                                <button
                                    class="flex-shrink-0 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-700 border-0 py-2 px-4 md:px-8 rounded text-lg ">30分の戦歴</button>
                                    <h1 class="flex flex-wrap justify-center text-5xl sm:text-7xl font-medium title-font text-gray-900 my-5 md:my-0 md:ml-10 ">
                                        <div class="mr-2">
                                            <span class="">{{ $thiCount }}<span class="text-lg">戦</span></span>
                                        </div>
                                        <div>
                                            <span class="mr-1">{{ $thiWinCount }}<span class="text-lg">勝</span></span>
                                            <span class="mr-1">{{ $thiLoseCount }}<span class="text-lg">敗</span></span>
                                        </div>
                                    </h1>                      
                            </div>
                            {{-- コメントリスト --}}
                            @foreach ($thirty as $thi)
                            <div>
                                <section class="text-gray-600 body-font">
                                    <div class="container">
                                      <div class="-m-4">
                                        <div class="p-4 lg:w-2/3 mx-auto">
                                            <a href="{{ route('detail', ['id' => $thi->id])}}">
                                                <div class="flex items-center bg-gray-100 bg-opacity-75 p-4 rounded-lg">
                                                  <div class="flex-shrink-0 title-font sm:text-2xl text-xl font-medium text-gray-900 mr-2 md:mr-5">
                                                      @if($thi->judge == \Constant::JUDGE['winner'] )
                                                      <span class="text-white bg-red-400 py-1 px-3 rounded-lg">勝ち</span>
                                                      @else
                                                      <span class="text-white bg-blue-400 py-1 px-3 rounded-lg">負け</span>
                                                      @endif
                                                  </div>
                                                  <div class="truncate">{{ $thi->comment }}</div>
                                                </div>
                                            </a>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                            </div>
                            @endforeach
                            <div class="mt-5 lg:w-2/3 mx-auto">
                                {{ $thirty->appends([
                                    'date' => \Request::get('date'),
                                  ])->links() }}
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
