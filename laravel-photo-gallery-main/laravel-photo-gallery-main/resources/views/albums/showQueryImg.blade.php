<style>
    .image-container {
        max-width: 100%;
        overflow: hidden;
    }

    .main-image {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adjust the minimum width as needed */
        gap: 50px 15px; /* Adjust the gap between grid items both horizontally and vertically */
        margin: 20px auto; /* Adjust margin as needed */
    }

    .grid-item {
        overflow: hidden;
        margin: 0 10px 20px 0; /* Adjust margins to create space both horizontally and vertically between grid items */
        position: relative;
    }

    .grid-item img {
        width: 100%; /* Set the width to 100% to match the width of the header image */
        height: auto;
        object-fit: cover;
    }

    .buttons-container {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: space-between;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        opacity: 0;
        transition: opacity 0.3s ease; /* Add a transition for a smooth effect */
    }

    .grid-item:hover .buttons-container {
        opacity: 1; /* Show buttons when the grid item is hovered */
    }

    .button {
        padding: 5px;
        border: none;
        cursor: pointer;
    }

    .button.red {
        background-color: #e53e3e; /* Red color */
        color: #ffffff;
    }

    .button.green {
        background-color: #48bb78; /* Green color */
        color: #ffffff;
    }
</style>

<x-app-layout>
    <x-slot name="header" style="margin-bottom: 20px;">
        <a class="text-indigo-500 hover:text-indigo-700 font-semibold" href="{{ route('album.show', $album->id) }}">
            {{ $album->title }}
        </a>
    </x-slot>

    <div class="container mx-auto m-2 p-2 bg-white shadow-md rounded-lg">
        <div class="image-container">
            <img class="main-image" src="{{ $image->getUrl() }}" alt="Main Image">
        </div>

        <div class="grid-container">
            @for ($i = 1; $i <= 11; $i++)
                <div class="grid-item">
                    <img class="main-image" src="{{ $image->getUrl() }}" alt="Grid Image {{ $i }}">
                    <div class="buttons-container">
                        <button class="button red">\irrelevant</button>
                        <button class="button green">\relevant</button>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</x-app-layout>