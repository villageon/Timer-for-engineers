<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">

                    {{-- フラッシュメッセージ --}}
                    <div id="flash" class="px-6">
                        <x-flash-message status="session('status')" />
                    </div>

                    <section class="text-gray-600 body-font">
                        <div class="container py-10 mx-auto">
                            <div class="lg:w-5/6 mx-auto">
                                    {{-- header --}}
                                    <x-thumbnail filename="{{ $user->image->header ?? '' }}" type="header" />
                                <div class="flex justify-center m-10 ">
                                    <div class="md:flex items-center sm:w-2/3 text-center pt-10 border-gray-400">
                                        <div class="w-32 h-32 md:w-40 md:h-40  rounded-full mx-auto object-cover overflow-hidden border border-gray-500">

                                            {{-- icon --}}
                                            <x-thumbnail filename="{{ $user->image->icon ?? ''}}" type="icon" />

                                        </div>
                                        <div class="md:w-1/2">
                                            <div class="">
                                                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg md:text-2xl lg:text-4xl">
                                                    {{ $user->name }}</h2>
                                                <div class="w-12 h-1 bg-gradient-to-r from-teal-200 via-teal-400 to-teal-500 rounded mt-2 mb-4 mx-auto"></div>
                                                <h4 class="text-md md:text-lg lg:text-xl">
                                                    @if(!isset($user->profile->contents))
                                                    自己紹介を入力してください。
                                                    @else
                                                    {{ $user->profile->contents}}
                                                    @endif
                                                </h4>
                                            </div>
                                            <div class="flex justify-center items-center mt-3">
                                                <h2 class="title-font mt-4 text-gray-700 text-lg md:text-2xl lg:text-4lx text-center mr-5">メンター</h2>
                                                <h2 class="title-font mt-4 text-gray-900 text-lg md:text-2xl lg:text-4lx text-center">
                                                    {{ $user->menter->m_name ?? '未設定' }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-40 md:w-80 h-1 bg-gradient-to-r from-teal-200 via-teal-400 to-teal-500 rounded mt-2 mb-4 mx-auto"></div>
                            <div class="flex justify-center py-5">
                                <a href="{{ route('edit') }}">
                                    <button type="button"
                                        class="mx-auto text-white bg-green-500 border-0 my-5 py-2 px-4 md:px-8 focus:outline-none hover:bg-green-700 rounded">プロフィール編集</button>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/flash.js') }}" defer></script>
</x-app-layout>
