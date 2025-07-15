<x-layout :title="$pageTitle">
    <div class="w-full p-6 md:p-8 max-w-2xl rounded-xl shadow-2xl bg-[oklch(92.4%_0.12_95.746)] font-mono">
        <h2 class="text-center font-bold text-3xl text-gray-800 mb-8">
            Categories List
        </h2>
        <div class="space-y-6 w-full max-w-2xl">
            @foreach ($categories as $category)
                <div class="bg-white/60 p-5 rounded-lg shadow-md transition-transform duration-300 hover:scale-[1.02] hover:shadow-lg">
                    <a href="/categories/{{ $category->id }}" class="block ">
                        <div class="mb-3">
                            {{-- Display the post's title --}}
                            <span class="text-gray-900 font-bold text-2xl">{{ $category->title }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="mt-4">
            {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-layout>
