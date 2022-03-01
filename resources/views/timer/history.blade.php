<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('戦歴') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto border-b py-10 border-gray-200">
                            <div class="lg:w-2/3 flex flex-col sm:flex-row sm:items-center sm:mr-5 md:mb-5 items-start mx-auto">
                                <button
                                    class="flex-shrink-0 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg ">15分の戦歴</button>
                                <h1 class="flex-grow text-4xl font-medium title-font text-gray-900 my-5 md:my-0 md:ml-10 ">
                                    <span>{{ $fifCount }}</span>戦
                                    <span>{{ $fifWinCount }}</span>勝
                                    <span>{{ $fifLoseCount }}</span>敗
                                </h1>                      
                            </div>
                            {{-- コメントリスト --}}
                            @foreach ($fifteen as $fif)
                            <div>
                                <section class="text-gray-600 body-font">
                                    <div class="container">
                                      <div class="-m-4">
                                        <div class="p-4 lg:w-2/3 mx-auto">
                                          <div class="flex items-center bg-gray-100 bg-opacity-75 p-4 rounded-lg">
                                            <div class="flex-shrink-0 title-font sm:text-2xl text-xl font-medium text-gray-900 mr-2 md:mr-5">
                                                @if($fif->judge == '1')
                                                <span class="text-white bg-red-400 py-1 px-3 rounded-lg">勝ち</span>
                                                @else
                                                <span class="text-white bg-blue-400 py-1 px-3 rounded-lg">負け</span>
                                                @endif
                                            </div>
                                            <div class="truncate">{{ $fif->comment }}</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                            </div>
                            @endforeach
                            <div class="mt-5 lg:w-2/3 mx-auto">
                                {{ $fifteen->links() }}
                            </div>
                        </div>
                    </section>

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto border-b py-10 border-gray-200">
                            <div class="lg:w-2/3 flex flex-col sm:flex-row sm:items-center sm:mr-5 md:mb-5 items-start mx-auto">
                                <button
                                    class="flex-shrink-0 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg ">30分の戦歴</button>
                                <h1 class="flex-grow text-4xl font-medium title-font text-gray-900 my-5 md:my-0 md:ml-10 ">
                                    <span>{{ $thiCount }}</span>戦
                                    <span>{{ $thiWinCount }}</span>勝
                                    <span>{{ $thiLoseCount }}</span>敗
                                </h1>                      
                            </div>
                            {{-- コメントリスト --}}
                            @foreach ($thirty as $thi)
                            <div>
                                <section class="text-gray-600 body-font">
                                    <div class="container">
                                      <div class="-m-4">
                                        <div class="p-4 lg:w-2/3 mx-auto">
                                          <div class="flex items-center bg-gray-100 bg-opacity-75 p-4 rounded-lg">
                                            <div class="flex-shrink-0 title-font sm:text-2xl text-xl font-medium text-gray-900 mr-2 md:mr-5">
                                                @if($thi->judge == '1')
                                                <span class="text-white bg-red-400 py-1 px-3 rounded-lg">勝ち</span>
                                                @else
                                                <span class="text-white bg-blue-400 py-1 px-3 rounded-lg">負け</span>
                                                @endif
                                            </div>
                                            <div class="truncate">{{ $thi->comment }}</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                            </div>
                            @endforeach
                            <div class="mt-5 lg:w-2/3 mx-auto">
                                {{ $thirty->links() }}
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
