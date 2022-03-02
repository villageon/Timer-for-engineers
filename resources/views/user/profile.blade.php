<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-10 mx-auto flex flex-col">
                          <div class="lg:w-4/6 mx-auto">
                            <div class="rounded-lg h-64 overflow-hidden">
                              <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1200x500">
                            </div>
                            <div class="flex justify-center mt-10">
                              <div class="sm:w-1/3 text-center py-8">
                                <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                  </svg>
                                </div>
                                <div class="flex flex-col items-center text-center justify-center">
                                  <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $user->name }}</h2>
                                  <div class="w-12 h-1 bg-green-500 rounded mt-2 mb-4"></div>
                                  <p class="text-base">{{ $user->profile->contents }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="flex justify-center py-5">
                            <a href="{{ route('edit')}}">
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
</x-app-layout>
