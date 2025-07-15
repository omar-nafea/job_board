<x-layout :title="$pageTitle">

    <!-- Main Card Container -->
    <div class="w-full max-w-4xl mx-auto p-6 md:p-8 rounded-xl shadow-2xl bg-[oklch(92.4%_0.12_95.746)] font-mono">
        
        <!-- Header -->
        <h2 class="text-center font-bold text-3xl text-gray-800 mb-8">
            Writers List
        </h2>
        <div class="space-y-6">
          @foreach ($writers as $writer)
            <a href="/writers/{{ $writer->id }}" class="block font-bold transition-transform duration-300 hover:scale-[1.02] hover:shadow-lg hover:underline">
              <div class="bg-white/60 p-5 rounded-lg shadow-md transition-transform duration-300">
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
              </div> <!-- End of posts loop container -->
          </a>
          @endforeach
        </div> <!-- End of main card -->
        <div class="m-4">
            {{$writers->links()}}
        </div>
    </div> <!-- End of main card -->
</x-layout>