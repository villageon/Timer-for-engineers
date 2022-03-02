<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-10 mx-auto flex flex-col">

                                <div class="-m-2 mb-5 md:w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-sm text-gray-600">名前 ※必須</label>
                                        <input type="text" id="name" name="name" required value="{{ $user->name }}"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>

                                <div class="-m-2 mb-5 md:w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="contents" class="leading-7 text-sm text-gray-600">自己紹介文</label>
                                        <textarea id="contents" name="contents" rows="10"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $user->profile->contents }}</textarea>
                                    </div>
                                </div>

                                <div class="-m-2 mb-5 md:w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="header_image" class="leading-7 text-sm text-gray-600">ヘッダー画像</label>
                                        <input type="file" id="header_image" name="header_image" accept="image/png, image/jpen, image/jpg"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>

                                <div class="-m-2 mb-5 md:w-1/2 mx-auto">
                                    <div class="relative">
                                        <label for="icon_image" class="leading-7 text-sm text-gray-600">アイコン画像</label>
                                        <input type="file" id="icon_image" name="icon_image" accept="image/png, image/jpen, image/jpg"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>

                                <div class="flex justify-center items-center my-5">
                                    <div class="mr-5">
                                        <button type="button" onclick="location.href='{{ route('profile') }}'"
                                            class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded">戻る</button>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="mx-auto text-white bg-green-500 border-0 py-2 px-4 md:px-8  focus:outline-none hover:bg-green-700 rounded">更新する</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
