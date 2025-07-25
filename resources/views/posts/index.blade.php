<x-layout :title="$pageTitle">
  <!-- Main Card Container -->
  <div class="w-full p-6 md:p-8 rounded-xl shadow-2xl bg-[#fff0e5] font-mono">

    <!-- Header -->
    <h2 class="text-center font-bold text-3xl text-gray-800 mb-8">
      Posts List
    </h2>

    <!-- Posts Loop Container -->
    <div class="space-y-6 w-full">

      @forelse ($posts as $post)
      <!-- A single post card -->
      <!-- <div class="flex justify-between"></div> -->
      <div
      class="bg-white/60 p-5 rounded-lg shadow-md transition-transform duration-300 hover:scale-[1.02] hover:shadow-lg">
      <a href="/posts/{{ $post->id }}" class="block ">
        <div class="mb-3">
        <span class="font-bold text-gray-700">Title:</span>
        {{-- Display the post's title --}}
        <span class="text-gray-900">{{ $post->title }}</span>
        </div>
        <div class="mb-4">
        <span class="font-bold text-gray-700">Body:</span>
        {{-- Display the post's body --}}
        <p class="text-gray-800 mt-1 text-sm leading-relaxed">
          {{ $post->body }}
        </p>
        </div>
      </a>
      <div class="flex  gap-2 my-4">
        <a href="/"
        class="px-2 py-1 bg-blue-700 text-white rounded hover:bg-blue-800 transition-colors capitalize ease-in-out duration-200">Edit</a>
        <a href="/"
        class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors capitalize ease-in-out duration-200">delete</a>
      </div>
      <div
        class="flex flex-wrap justify-between items-center text-xs text-gray-600 border-t border-gray-300 pt-3 mt-3">
        <a href="/writers/{{ $post->writer->id }}"
        class="font-bold underline  transition-transform duration-200 hover:scale-[1.1] hover:shadow-lg"><span>Writer:</span>
        {{ $post->writer->name }}</a>
        <p><span class="font-bold">Category:</span> {{ $post->categories->first()?->title ?? 'No Category' }}</p>

      </div>

      </div>
    @empty
      {{-- This block runs if the $posts collection is empty --}}
      <div class="bg-white/60 p-5 rounded-lg text-center text-gray-500">
      <p>No posts found.</p>
      </div>
    @endforelse

      <div class="mt-4">
        {{ $posts->links() }}
      </div>
    </div> <!-- End of posts loop container -->
  </div> <!-- End of main card -->
</x-layout>