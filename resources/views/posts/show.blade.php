<x-layout :title="$pageTitle">
  <!-- Main Card Container -->
    <div class="w-full max-w-2xl p-6 md:p-8 rounded-xl shadow-2xl bg-[#fff0e5] font-mono">
        
        <!-- Header -->
        <h2 class="text-center font-bold text-3xl text-gray-800 mb-8">
            Post Card
        </h2>
        <div class="space-y-6">
          <div class="bg-white/60 p-5 rounded-lg shadow-md">
              <div class="mb-3">
                  <span class="font-bold text-gray-700">Title:</span>
                  <span class="text-gray-900">{{ $post->title }}</span>
              </div>
              <div class="mb-4">
                  <span class="font-bold text-gray-700">Body:</span>
                  <p class="text-gray-800 mt-1 text-sm leading-relaxed">
                      {{ $post->body }}
                  </p>
              </div>
              <div class="flex flex-wrap justify-between items-center text-xs text-gray-600 border-t border-gray-300 pt-3 mt-3">
                        <a href="/writers/{{ $post->writer->id }}" class="font-bold underline  transition-transform duration-200 hover:scale-[1.1] hover:shadow-lg"><span >Writer:</span> {{ $post->writer->name }}</a>
                        <p><span class="font-bold">Category:</span>   {{ $post->categories->first()?->title ?? 'No Category' }}</p>

              </div>
              <div class="flex gap-2 my-4">
                <a href="/" class="px-2 py-1 bg-blue-700 text-white rounded hover:bg-blue-800 transition-colors capitalize ease-in-out duration-200">Edit</a>
                <a href="/" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors capitalize ease-in-out duration-200">delete</a>
                <a href="/" class="px-2 py-1 bg-indigo-700 text-white rounded hover:bg-indigo-900 transition-colors duration-200 ease-in-out capitalize ">comment</a>
              </div>
          </div>


        </div> <!-- End of posts loop container -->

    </div> <!-- End of main card -->
</x-layout>