<section class="text-gray-600 body-font">
    <div class="container mx-auto">
        <div class="text-center mb-2">
            <div class="md:flex justify-center items-end">
                <div class="md:flex items-end">
                    <div class="w-20 md:w-24 lg:w-32 md:mr-2 mx-auto">
                        <img src="{{ asset('images/crown.png') }}" alt="">
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl">タイムアタックランキング</h2>
                </div>

                @if($type == \Constant::MINUTES['fifteen'])
                <h2 class="text-3xl md:text-4xl lg:text-5xl">【15分の部】</h2>
                @elseif($type == \Constant::MINUTES['thirty'])
                <h2 class="text-3xl md:text-4xl lg:text-5xl">【30分の部】</h2>
                @endif
                
            </div>
        </div>
    </div>
    <div class="md:flex bg-gradient-to-r from-green-200 via-green-100 to-green-200 py-10 px-5">
        <div class="md:w-3/5 lg:w-1/2 md:mr-5">
            {{-- 1~3位 --}}
            @foreach ($oneToThree as $index => $value)
                <div class="mb-2 md:mb-5 lg:mb-8 md:px-5">
                    @if($index == 0)
                    <div class="w-16 md:w-20 lg:w-24 mx-auto mb-2">
                        <img src="{{ asset('images/first-2.png') }}" alt="">
                    </div>
                    @elseif($index == 1)
                    <div class="w-16 md:w-20 lg:w-24 mx-auto mb-2">
                        <img src="{{ asset('images/second-2.png') }}" alt="">
                    </div>
                    @elseif($index == 2)
                    <div class="w-16 md:w-20 lg:w-24 mx-auto mb-2">
                        <img src="{{ asset('images/third-2.png') }}" alt="">
                    </div>
                    @endif
                    <div class="flex items-center px-4 py-2 rounded-lg">
                        <div
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4 md:mr-10 overflow-hidden">
                            <x-thumbnail filename="{{ $value['image']['icon'] ?? '' }}"
                                type="icon" />
                        </div>
                        <div class="md:flex text-center flex-auto items-center">
                            <h2
                                class="text-lg md:text-2xl lg:text-3xl text-gray-900 title-font font-medium md:mr-3">
                                <a
                                    href="{{ route('profile.show', ['id' => $value['user']['id']]) }}">
                                    {{ $value['user']['name'] }}
                                </a>
                            </h2>
                            <h3 class="flex-auto text-xl md:text-3xl lg:text-4xl text-red-900">
                                @if ($date === 'year')
                                    {{ $value['fif_all'] }}%
                                @elseif($date === 'month')
                                    {{ $value['fif_month'] }}%
                                @elseif($date === 'day')
                                    {{ $value['fif_day'] }}%
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 4位~10位 --}}
        <div class="md:w-2/5 lg:w-1/2 mt-10 md:mt-15 px-1 md:px-3 lg:px-8">
            <div class="">
                @foreach ($fourToTwelve as $index => $value)
                    <div class="mt-10">
                        <div class="flex items-center border-b border-gray-200">
                            <div class="flex shrink-0">
                                <h2 class="text-xl md:text-2xl lg:text-3xl mr-3 lg:mr-5">
                                    {{ $index + 4 }}位</h2>
                            </div>
                            <div class="flex flex-auto">
                                <div class="flex flex-auto items-center">
                                    <h2
                                        class="text-md md:text-lg lg:text-xl text-gray-900 title-font font-medium mr-3 lg:mr-5">
                                        <a
                                            href="{{ route('profile.show', ['id' => $value['user']['id']]) }}">
                                            {{ $value['user']['name'] }}
                                        </a>
                                    </h2>
                                    <p
                                        class="flex-auto text-center text-lg md:text-xl lg:text-2xl text-red-900">
                                        @if ($date === 'year')
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
</section>