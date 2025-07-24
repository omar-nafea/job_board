    <x-layout :title="$pageTitle">
    <!-- Main Card Container -->
    <div class="w-full p-6 md:p-8 rounded-xl shadow-2xl bg-[#fff0e5] font-mono">

        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="font-bold text-3xl text-gray-800">
                Posts List
            </h2>

            <!-- The "Create New Post" magic button -->
            <div class="group relative inline-block">
                <!-- The Shadow Layer -->
                <div class="absolute inset-0 rounded-lg bg-black"></div>
                <!-- The Anchor Tag styled as a Button -->
                <a href="/posts/create"
                   class="
                      relative block w-full
                      transform
                      rounded-lg
                      border-2 border-black
                      bg-white
                      px-6 py-2
                      text-sm font-bold text-black
                      transition-transform duration-150 ease-in-out
                      group-hover:translate-x-[2px]
                      group-hover:translate-y-[-2px]
                    "
                >
                    Create New Post
                </a>
            </div>
        </div>

        <!-- Posts Loop Container -->
        <div class="space-y-6 w-full">

            @forelse ($posts as $post)
                <!-- A single post card, now styled as a "magic button" -->
                <div class="group relative">
                    <!-- The Shadow Layer for the card -->
                    <div class="absolute inset-0 rounded-lg bg-black"></div>

                    <!-- The entire card is now a single clickable link -->
                    <a href="/posts/{{ $post->id }}"
                       class="
                          relative block w-full
                          transform
                          rounded-lg
                          border-2 border-black
                          bg-white/80
                          p-5
                          transition-transform duration-150 ease-in-out
                          group-hover:translate-x-[2px]
                          group-hover:translate-y-[-2px]
                        "
                    >
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
                        <div
                            class="flex flex-wrap justify-between items-center text-xs text-gray-600 border-t border-gray-300 pt-3 mt-3">
                            <span class="font-bold"><span>Writer:</span>
                                {{ $post->writer->name }}</span>
                            <p><span class="font-bold">Category:</span> {{ $post->categories->first()?->title ?? 'No Category' }}
                            </p>
                        </div>
                    </a>
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

