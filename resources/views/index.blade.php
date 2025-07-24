<x-layout :title="$pageTitle">
    <div class="group mb-4 p-4 flex flex-wrap gap-4 rounded-2xl text-white bg-gray-800 shadow-lg shadow-gray-800">
        <h2 class="text-2xl font-bold">Categories: </h2>
        @foreach ($categories as $category)
            <x-nav :active="request()->is('categories/' . $category->id)" href="/categories/{{ $category->id }}">
                {{ $category->title }}
            <!-- <x-nav :active="request()->is(\"category/{$category->id}/posts\")" 
             href="/category/{{ $category->id }}/posts"> 
             {{ $category->title }} -->
            </x-nav>
        @endforeach
    </div>

    <div class="space-y-6">
            
        <h2 class="text-2xl font-bold">Posts: </h2>

            @forelse ($posts as $post)
                <div class="w-full max-w-2xl p-6 md:p-8 rounded-xl shadow-2xl bg-[#fff0e5] font-mono">

                    <a href="/posts/{{ $post->id }}" class="block ">
                        <div class="space-y-6 transition-transform duration-300 hover:scale-[1.02] hover:shadow-lg">
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
                              </div>
                          </div>

                        </div> <!-- End of posts loop container -->
                    </a>
                </div> <!-- End of main card -->
                
            @empty
                {{-- This block runs if the $posts collection is empty --}}
                <div class="bg-white/60 p-5 rounded-lg text-center text-gray-500">
                    <p>No posts found.</p>
                </div>
            @endforelse
            <div class="m-4">
                    {{ $posts->links() }}
            </div>
        </div> <!-- End of posts loop container -->
</x-layout>