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
        <img src="{{ asset('images/no-image.png') }}" alt="" />
    @else
        <img src="{{ asset($path . $filename) }}" alt="">
    @endif
</div>