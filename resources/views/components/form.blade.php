@if($judge == \Constant::JUDGE['loser'])
<div id="lose-comment-form" class="mt-5 hidden">
@elseif($judge == \Constant::JUDGE['winner'])   
<div id="win-comment-form" class="mt-5 hidden">
@endif

    @if($type == \Constant::MINUTES['fifteen'])
        <form action="{{ route('fif-timer.record') }}" method="post">
    @elseif($type == \Constant::MINUTES['thirty'])
        <form action="{{ route('thi-timer.record') }}" method="post">
    @endif

    @csrf

    @if($type == \Constant::MINUTES['fifteen'])
        <input type="hidden" name="type" value="{{ \Constant::MINUTES['fifteen'] }}">
    @elseif($type == \Constant::MINUTES['thirty'])
        <input type="hidden" name="type" value="{{ \Constant::MINUTES['thirty'] }}">
    @endif

    @if($judge == \Constant::JUDGE['loser'])
        <input type="hidden" name="judge" value="{{ \Constant::JUDGE['loser'] }}">
    @elseif($judge == \Constant::JUDGE['winner'])
        <input type="hidden" name="judge" value="{{ \Constant::JUDGE['winner'] }}">
    @endif

        <div class="container mx-auto flex">
            <div
                class="bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto relative shadow-lg">
                <div class="relative mb-4">
                    <label>

                        @if($judge == \Constant::JUDGE['loser'])
                        <input type="checkbox" id="menter_lose_checkbox" name="menter_checkbox" value="1">
                        @elseif($judge == \Constant::JUDGE['winner'])
                        <input type="checkbox" id="menter_win_checkbox" name="menter_checkbox" value="1">
                        @endif
                        
                        メンターにメールを送信する
                    </label>
                </div>

                @if($judge == \Constant::JUDGE['loser'])
                <div id="menter_lose_form" class="hidden">
                @elseif($judge == \Constant::JUDGE['winner'])
                <div id="menter_win_form" class="hidden">
                @endif

                    <div class="relative mb-4">
                        <label for="m_name"
                            class="leading-7 text-sm text-gray-600">メンター</label>
                        <input type="text" id="m_name" name="m_name"
                            value="{{ $menter->m_name }}"
                            class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="m_email"
                            class="leading-7 text-sm text-gray-600">メールドレス</label>
                        <input type="email" id="m_email" name="m_email"
                            value="{{ $menter->m_email }}"
                            class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>

                <div class="relative mb-4">

                    @if($judge == \Constant::JUDGE['loser'])
                    <label for="comment" class="leading-7 text-sm text-gray-600">敗者のコメント</label>
                    @elseif($judge == \Constant::JUDGE['winner'])
                    <label for="comment" class="leading-7 text-sm text-gray-600">勝者のコメント</label>
                    @endif

                    <textarea id="comment" name="comment" required rows="10"
                        class="w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>

                @if($judge == \Constant::JUDGE['loser'])
                <button id="loser-submit" class="text-white bg-green-700 border-0 py-2 px-6 focus:outline-none hover:bg-green-800 rounded text-lg">送信する</button>
                <button id="loser-submit-warning" class="hidden text-white bg-yellow-700 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-800 rounded text-lg">送信する</button>
                <button id="loser-submit-danger" class="hidden text-white bg-red-700 border-0 py-2 px-6 focus:outline-none hover:bg-red-800 rounded text-lg">送信する</button>
                @elseif($judge == \Constant::JUDGE['winner'])
                <button id="winner-submit" class="text-white bg-green-700 border-0 py-2 px-6 focus:outline-none hover:bg-green-800 rounded text-lg">送信する</button>
                <button id="winner-submit-warning" class="hidden text-white bg-yellow-700 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-800 rounded text-lg">送信する</button>
                <button id="winner-submit-danger" class="hidden text-white bg-red-700 border-0 py-2 px-6 focus:outline-none hover:bg-red-800 rounded text-lg">送信する</button>
                @endif
            </div>
        </div>
    </form>
</div>