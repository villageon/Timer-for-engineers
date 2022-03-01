<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('15分タイマー') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div
                                class="flex items-center lg:w-3/5 mx-auto pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                                <div class="sm:w-48 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center">
                                    <img src="{{ asset('images/fifteen.png') }}" alt="">
                                </div>
                                <div>
                                    <div class="flex-grow text-center mt-5">
                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">
                                            15分間の勝負です!!
                                        </h2>
                                    </div>

                                    {{-- タイマー --}}
                                    <div class="mt-10 text-center">
                                        <p id="display" class="flex justify-center text-8xl">0:10</p>
                                    </div>

                                    <div id="lose-comment-form" class="mt-5 hidden">
                                        <form action="{{ route('fif-timer.record')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="type" value="1">
                                            <input type="hidden" name="judge" value="2">
                                            <div class="p-2 w-3/4 mx-auto">
                                                <div class="relative">
                                                    <label for="comment" class="leading-7 text-xl text-gray-600">敗者のコメント</label>
                                                    <textarea id="comment" name="comment" required rows="5"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit"
                                                    class="text-white bg-green-800 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded">送信する</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div id="win-comment-form" class="mt-5 hidden">
                                        <form action="{{ route('fif-timer.record')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="type" value="1">
                                            <input type="hidden" name="judge" value="1">
                                            <div class="p-2 w-3/4 mx-auto">
                                                <div class="relative">
                                                    <label for="comment" class="leading-7 text-xl text-gray-600">勝者のコメント</label>
                                                    <textarea id="comment" name="comment" required rows="5"
                                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button type="submit"
                                                    class="text-white bg-green-800 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded">送信する</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mt-10">
                                        <button type="button" id="fifteen-timer-start"
                                            class="flex mx-auto text-white bg-green-500 border-0 mt-5 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">スタート
                                        </button>
                                        <button type="button" id="fifteen-timer-stop"
                                            class="inactive flex mx-auto text-white bg-green-500 border-0 mt-5 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">ストップ
                                        </button>
                                        <button type="button" id="fifteen-timer-reset"
                                            class="inactive flex mx-auto text-white bg-green-500 border-0 mt-5 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">リセット
                                        </button>
                                        <button type="button" id="fifteen-timer-complete"
                                            class="inactive flex mx-auto text-white bg-green-500 border-0 mt-5 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">実装完了
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        let minutes
        let seconds
        let running = false
        let timeUp = false
        let comment = false
        let display = document.getElementById("display")
        let start = document.getElementById("fifteen-timer-start")
        let stop = document.getElementById("fifteen-timer-stop")
        let reset = document.getElementById("fifteen-timer-reset")
        let complete = document.getElementById("fifteen-timer-complete")
        let LoseCommentForm = document.getElementById("lose-comment-form")
        let WinCommentForm = document.getElementById("win-comment-form")

        function resetTime() {
            minutes = 0
            seconds = 10
        }

        function displayTime() {
            display.textContent = `${("0" + minutes).slice(-2)}:${("0" + seconds).slice(-2)}`;
        }

        function countDown() {
            setTimeout(() => {
                if (!running) {
                    return;
                } else if (seconds > 0) {
                    seconds--;
                    displayTime();
                } else if (seconds === 0) {
                    if (minutes > 0) {
                        minutes--;
                        seconds = 59;
                        displayTime();
                    } else if (minutes === 0) {
                        stopped = true;
                        timeUp = true;
                        running = false;
                        comment = true;

                        start.classList.add("inactive");
                        stop.classList.add("inactive");
                        reset.classList.add("inactive");
                        complete.classList.add("inactive");
                        LoseCommentForm.classList.remove("hidden");

                        display.textContent = "Your Lose";
                    }
                }
                countDown();
            }, 1000);
        }

        start.addEventListener("click", () => {
            if(comment){
                return;
            }
            if (running) {
                return;
            } else if(timeUp){
                return;
            } else {
                running = true;
                start.classList.add("inactive");
                stop.classList.remove("inactive");
                reset.classList.add("inactive");
                complete.classList.remove("inactive");
                countDown();
            }
        });

        stop.addEventListener("click", () => {
            if(comment){
                return;
            }
            if (running) {
                running = false;
                stop.classList.add("inactive");
                start.classList.remove("inactive");
                reset.classList.remove("inactive");
                complete.classList.remove("inactive");
            } else {
                return;
            }
        });

        reset.addEventListener("click", () => {
            if(comment){
                return;
            }
            if (running) {
                return;
            }
            resetTime();
            displayTime();
            timeUp = false;
            start.classList.remove("inactive");
            reset.classList.add("inactive");
        });

        complete.addEventListener("click", () => {
            if(comment){
                return;
            }
            if (!running) {
                return;
            }
            resetTime();
            displayTime();
            start.classList.add("inactive");
            stop.classList.add("inactive");
            reset.classList.add("inactive");
            complete.classList.add("inactive");

            WinCommentForm.classList.remove("hidden");

            stopped = true;
            timeUp = true;
            running = false;
            comment = true;
            display.textContent = "Your Win";
        });

        resetTime();
        displayTime();
    </script>
</x-app-layout>
