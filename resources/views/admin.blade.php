@extends('layouts.app')

@section('content')
<div class="flex">

    {{-- Sidebar --}}
    <x-sidebar></x-sidebar>
    {{-- Main Content Area --}}
    <main class="w-3/4 p-6">
        <h1 class="text-2xl font-bold mb-4">Welcome to the Admin Panel</h1>

    </main>
</div>
@endsection
