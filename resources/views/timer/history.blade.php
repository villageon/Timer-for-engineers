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
                        <div class="container px-5 mx-auto">
                            <div class="lg:w-2/3 flex flex-col sm:flex-row sm:items-center sm:mr-5 items-start mx-auto border-b pb-10 border-gray-200">
                                <button
                                    class="flex-shrink-0 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg ">15分の戦歴</button>
                                <h1 class="flex-grow text-4xl font-medium title-font text-gray-900 mt-5 md:mt-0 md:ml-10 ">5戦 3勝 2敗</h1>
                                
                                {{-- コメントリスト --}}
                                <x-comment-list :type="$fif"/>
                            </div>
                        </div>
                    </section>

                    <section class="text-gray-600 body-font mt-10">
                        <div class="container px-5 mx-auto">
                            <div class="lg:w-2/3 flex flex-col sm:flex-row sm:items-center sm:mr-5 items-start mx-auto border-b pb-10 border-gray-200">
                                <button
                                    class="flex-shrink-0 text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg ">30分の戦歴</button>
                                <h1 class="flex-grow text-4xl font-medium title-font text-gray-900 mt-5 md:mt-0 md:ml-10 ">5戦 3勝 2敗</h1>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
