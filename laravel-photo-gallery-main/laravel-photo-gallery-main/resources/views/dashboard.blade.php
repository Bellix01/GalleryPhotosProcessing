<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden; /* Hide overflow to prevent scrolling */
    }

    .animated-image {
        background-image: url('https://images.unsplash.com/photo-1666718885155-be10a011641a?q=80&w=2030&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        animation: imageAnimation 15s ease infinite;
        height: 100vh;
        overflow: hidden; /* Hide overflow to prevent scrolling */
    }

    @keyframes imageAnimation {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="animated-image">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        </div>
    </div>
</x-app-layout>
