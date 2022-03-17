<section class="text-gray-600 body-font md:border-solid md:border-8 md:border-teal-500 rounded my-10">
    <div class="container">
        <div class="text-center mb-5 md:mb-10 md:p-5">
            <div class="md:flex justify-center items-end">
                <div class="md:flex items-end">
                    <div class="w-20 md:w-24 lg:w-32 md:mr-2 mx-auto">
                        <img src="../../images/crown.png" alt="">
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl">タイムアタックランキング</h2>
                </div>

                @if ($type == \Constant::MINUTES['fifteen'])
                    <h2 class="text-3xl md:text-4xl lg:text-5xl">【15分の部】</h2>
                @elseif($type == \Constant::MINUTES['thirty'])
                    <h2 class="text-3xl md:text-4xl lg:text-5xl">【30分の部】</h2>
                @endif

            </div>
        </div>
    </div>
    <div class="md:flex justify-around">
        <div class="md:w-4/7">
            {{-- 1~3位 --}}
            @foreach ($oneToThree as $index => $value)
                <div
                    class="mb-2 md:mb-5 lg:mb-8 py-5 md:p-5 bg-gradient-to-r from-teal-200 via-teal-100 to-teal-200 rounded">
                    @if ($index == 0)
                        <div class="w-16 md:w-20 lg:w-24 mx-auto">
                            <img src="../../images/first-2.png" alt="">
                        </div>
                    @elseif($index == 1)
                        <div class="w-16 md:w-20 lg:w-24 mx-auto">
                            <img src="../../images/second-2.png" alt="">
                        </div>
                    @elseif($index == 2)
                        <div class="w-16 md:w-20 lg:w-24 mx-auto">
                            <img src="../../images/third-2.png" alt="">
                        </div>
                    @endif
                    <div class="flex justify-around items-center py-2">
                        <div
                            class="w-16 md:w-20 object-cover object-center flex-shrink-0 rounded-full md:mr-5 overflow-hidden">
                            <a href="{{ route('profile.show', ['id' => $value['user']['id']]) }}">
                                <x-thumbnail filename="{{ $value['image']['icon'] ?? '' }}" type="icon" />
                            </a>
                        </div>
                        <div class="md:flex text-center items-center">
                            <h2
                                class="text-xl md:text-2xl lg:text-3xl text-gray-900 title-font font-medium md:mr-5 tracking-wide">
                                <a href="{{ route('profile.show', ['id' => $value['user']['id']]) }}">
                                    {{ $value['user']['name'] }}
                                </a>
                            </h2>
                            <h3 class="flex-auto text-2xl md:text-3xl lg:text-4xl text-red-900 tracking-wide">
                                @if ($type == \Constant::MINUTES['fifteen'])
                                    @if ($date === 'year')
                                        {{ $value['fif_all'] }}%
                                    @elseif($date === 'month')
                                        {{ $value['fif_month'] }}%
                                    @elseif($date === 'day')
                                        {{ $value['fif_day'] }}%
                                    @endif
                                @elseif($type == \Constant::MINUTES['thirty'])
                                    @if ($date === 'year')
                                        {{ $value['thi_all'] }}%
                                    @elseif($date === 'month')
                                        {{ $value['thi_month'] }}%
                                    @elseif($date === 'day')
                                        {{ $value['thi_day'] }}%
                                    @endif
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 4位~10位 --}}
        <div class="md:w-3/7 mt-10 md:mt-0 md:ml-5">
            <div class="">
                @foreach ($fourToTwelve as $index => $value)
                    <div class="mb-16">
                        <div class="flex items-end justify-around">
                            <h2 class="text-lg md:text-xl lg:text-2xl mr-3">{{ $index + 4 }}位</h2>
                            <h2 class="text-xl md:text-2xl lg:text-3xl text-gray-900 title-font font-medium mr-3">
                                <a href="{{ route('profile.show', ['id' => $value['user']['id']]) }}">
                                    {{ $value['user']['name'] }}
                                </a>
                            </h2>
                            <div class="text-lg md:text-xl lg:text-2xl text-red-900">
                                @if ($type == \Constant::MINUTES['fifteen'])
                                    @if ($date === 'year')
                                        {{ $value['fif_all'] }}%
                                    @elseif($date === 'month')
                                        {{ $value['fif_month'] }}%
                                    @elseif($date === 'day')
                                        {{ $value['fif_day'] }}%
                                    @endif
                                @elseif($type == \Constant::MINUTES['thirty'])
                                    @if ($date === 'year')
                                        {{ $value['thi_all'] }}%
                                    @elseif($date === 'month')
                                        {{ $value['thi_month'] }}%
                                    @elseif($date === 'day')
                                        {{ $value['thi_day'] }}%
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="h-1 bg-gradient-to-r from-teal-200 via-teal-400 to-teal-500 rounded mt-2"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
