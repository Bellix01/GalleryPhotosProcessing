<x-app-layout>
    <x-slot name="header">{{ $album->title }}</x-slot>
    <div class="container mx-auto m-2 p-2 bg-white shadow-md rounded-lg">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <form method="POST" action="{{ route('albums.upload', $album->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="sm:col-span-6">
              <label for="title" class="block text-sm font-medium text-gray-700"> Album Image </label>
              <div class="mt-1">
                <input type="file" id="image" name="image[]" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" multiple required/>
              </div>
            </div>
            <div class="sm:col-span-6 pt-5">
              <x-button class="bg-green-500">Upload</x-button>
            </div>
          
        </form>
        <div class="sm:col-span-6 pt-5">
            <x-button class="bg-green-500">
                <a  href="{{ route('album.image.showQuery', $album->id) }}">Relevance feedback process</a>
            </x-button>
        </div>
       </div>
       <div class="mt-4">
         <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4">
           @foreach ($photos as $photo)
           <div class="bg-gray-300 p-2"> 
              <a class="block relative h-56 rounded overflow-hidden">
                <img 
                alt="{{ $photo->getUrl() }}" 
              
                src="{{ $photo->getUrl() }}">
               </a>
               <div class="flex justify-between mt-4 p-4">
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="{{ route('album.image.show', [$album->id, $photo->id]) }}">Full image</a>
              <!-- <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="{{ route('album.image.crop', [$album->id, $photo->id]) }}">Crop</a> -->
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="{{ route('album.image.showQueryImg', [$album->id, $photo->id]) }}">RF</a>
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="{{ route('album.image.crop', [$album->id, $photo->id]) }}" id="cropImageLink">Crop</a>
              <a class="m-2 p-2 bg-blue-500 hover:bg-blue-700 rounded-lg" href="{{ route('album.image.download', [$album->id, $photo->id]) }}">Download</a>
              <form method="POST" action="{{ route('album.image.destroy', [$album->id, $photo->id]) }}">
              <div class="modal-body">
                <div id="croppieContainer" style="width: 100%;"></div>
              </div>
              
                @csrf
                @method('DELETE')
                <button class="m-2 p-2 rounded-lg bg-red-500 hover:bg-red-700">Del</button>  
              </form> 
            </div>
            </div>
           @endforeach
         </div>
       </div>
    </div>
</x-app-layout>