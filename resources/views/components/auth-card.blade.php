<div class="h-screen flex flex-col sm:justify-center items-center py-24 md:my-0 bg-gradient-to-r from-teal-200 via-teal-400 to-teal-500">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
