{{-- ヘッダーかアイコンかを判定する --}}
@php
if($type === 'header'){
    $path = 'storage/headers/';
}
if($type === 'icon'){
    $path = 'storage/icons/';
}
@endphp

<div>
    @if (empty($filename))
        @if ($type === 'header')
        <img src="{{ asset('images/h-noimage.png') }}" alt="" />
        @else
        <img src="{{ asset('images/i-noimage.png') }}" alt="" />
        @endif
    @else
        <img src="{{ asset($path . $filename) }}" alt="">
    @endif
</div>