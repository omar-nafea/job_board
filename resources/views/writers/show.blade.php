<x-layout :title="$pageTitle">

    <!-- Main Card Container -->
    <div class="w-full max-w-4xl mx-auto p-6 md:p-8 rounded-xl shadow-2xl bg-[#fff0e5] font-mono">
        
        <!-- Header -->
        <h2 class="text-center font-bold text-3xl text-gray-800 mb-8">
            Writer Card
        </h2>
        <div class="space-y-6">
              <div class="mb-3">
                  <span class=" text-gray-700">Name:</span>
                  <span class="font-bold text-gray-900"> {{ $writer->name }}</span>
              </div>
              <div class="mb-4">
                  <span class="font-bold text-gray-700">Number of Posts:</span>
                  <p class="inline text-gray-800 mt-1 text-sm leading-relaxed">
                      {{ $writer->num_of_posts }}
                  </p>
              </div>
              <!-- paginate posts -->
              
        @foreach ($posts as $post)
        <div class="space-y-6">
          <a href="/posts/{{ $post->id }}" class="block bg-white/60 p-5 rounded-lg shadow-md transition-transform duration-300 hover:scale-[1.02] hover:shadow-lg">
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
          </a>
        </div> <!-- End of posts loop container -->
        @endforeach
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div> <!-- End of main card -->
</x-layout>