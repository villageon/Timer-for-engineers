<section class="text-gray-600 body-font">
    <div class="container px-5 py-10 mx-auto border-b border-gray-200">
        <div class="lg:w-2/3 sm:flex justify-center items-center mx-auto mb-10 text-center">
            
            @if($type == \Constant::MINUTES['fifteen'])
            <button class="flex-shrink-0 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-700 border-0 py-2 px-4 md:px-8 rounded text-lg">15分の成績</button>
            @elseif($type == \Constant::MINUTES['thirty'])
            <button class="flex-shrink-0 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-700 border-0 py-2 px-4 md:px-8 rounded text-lg">30分の成績</button>
            @endif
            <h1 class="flex flex-wrap justify-center text-5xl sm:text-7xl font-medium title-font text-gray-900 my-5 md:my-0 md:ml-10 ">
                <div class="mr-2">
                    <span class="">{{ $count }}<span class="text-lg">戦</span></span>
                </div>
                <div>
                    <span class="mr-1">{{ $winCount }}<span class="text-lg">勝</span></span>
                    <span class="mr-1">{{ $loseCount }}<span class="text-lg">敗</span></span>
                </div>
            </h1>                      
        </div>
        {{-- コメントリスト --}}
        @foreach ($history as $fif)
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
            {{ $history->appends([
              'date' => \Request::get('date'),
            ])->links() }}
        </div>
    </div>
</section>