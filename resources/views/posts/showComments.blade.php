<x-layout>
  <div class="w-full flex flex-col space-y-12  px-6 md:p-8  shadow-2xl bg-[#fff0e5] font-mono">
    <h1 class="text-2xl font-bold">Comments of "<span class="text-gray-600 font-semibold">{{ $post->title }}</span>"
    </h1>
    <div class="flex flex-col space-y-4">
      @foreach ($comments as $comment)
      <div class="flex flex-col border-2  border-gray-900/10 p-4 space-y-2">
      <p class="text-sm">{{ $comment->comment }}</p>
      <div class="flex  justify-end">
        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <!-- The Shadow Layer -->
        <!-- The Anchor Tag styled as a Button -->
        <button type="submit" id="confirm-btn" class="
          inline-flex w-full justify-center transition-transform duration-150 ease-in-out 
           rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto
        ">
          Delete
        </button>
        </form>
        <!-- <form action="{{ route('comments.update', $comment->id) }}" method="POST">
          @csrf
          @method('PUT')
          <button type="submit" class="text-sm text-blue-500">Edit</button>
        </form> -->
        
      </div>
      </div>
    @endforeach
    </div>
  </div>
</x-layout>