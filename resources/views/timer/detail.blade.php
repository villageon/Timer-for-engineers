<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- 詳細 --}}
                    <div>
                        <section class="text-gray-600 body-font">
                            <div class="container">
                              <div class="-m-4">
                                <div class="p-4 lg:w-2/3 mx-auto">
                                    <div class="items-center bg-gray-100 bg-opacity-75 p-4 rounded-lg">
                                        <div class="flex">
                                            <div class="flex-shrink-0 title-font sm:text-2xl text-xl font-medium text-gray-900 mr-2 md:mr-5">
                                                @if($CommentDetail->type == \Constant::MINUTES['fifteen'] )
                                                    <span class="text-white bg-green-700 py-1 px-3 rounded-lg">15分</span>
                                                @else
                                                    <span class="text-white bg-green-700 py-1 px-3 rounded-lg">30分</span>
                                                @endif
                                            </div>
                                            <div class="flex-shrink-0 title-font sm:text-2xl text-xl font-medium text-gray-900 mr-2 md:mr-5">
                                                @if($CommentDetail->judge == \Constant::JUDGE['winner'] )
                                                    <span class="text-white bg-red-400 py-1 px-3 rounded-lg">勝ち</span>
                                                @else
                                                    <span class="text-white bg-blue-400 py-1 px-3 rounded-lg">負け</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            {{ $CommentDetail->comment }}
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            {{ $CommentDetail->created_at }}
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </section>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
