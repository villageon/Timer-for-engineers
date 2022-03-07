@props(['status' => 'info'])

@php
if (session('status') === 'info') {
    $bgColor = 'bg-green-500';
}
if (session('status') === 'alert') {
    $bgColor = 'bg-red-500';
}
@endphp

@if (session('message'))
    <div class="{{ $bgColor }} mx-auto p-2 text-white my-4">
        {{ session('message') }}
    </div>
@endif


