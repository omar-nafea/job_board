<x-layout :title="$pageTitle">
    <h2 class="font-bold text-3xl text-gray-800 mb-8">
        Edit: "<span class="font-light text-gray-600">{{ $post->title }}</span>" Post
    </h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" value="{{ $post->id }}" name="id"/>
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" autocomplete="given-name"
                                value="{{ old('title', $post->title) }}"
                                class="{{ $errors->has('title') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    {{--
                    This is the complete div for your author input.
                    Copy and paste this entire block to replace your existing one.
                    --}}
                    <div class="sm:col-span-3">
                        <label for="author_name" class="block text-sm/6 font-medium text-gray-900">Author</label>
                        <div class="mt-2">
                            {{-- 1. The VISIBLE input field for the user --}}
                            {{-- Its name is changed to "author_name" to not conflict with the ID field --}}
                            <!-- <input type="text" id="author_name" name="author_name" list="author-list" -->
                                <!-- placeholder="Type or select an author" autocomplete="off" -->
                                <!-- class="{{ $errors->has('writer_id') ? 'outline-red-500' : 'outline-gray-300' }} w-full rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"> -->

                            {{-- 2. The HIDDEN input field that will hold the selected author's ID --}}
                            {{-- This is what you will use in your controller. Notice the name is "writer_id" --}}
                            <!-- <input type="hidden" name="writer_id" id="author-id">

                            <datalist id="author-list">
                                @foreach ($writers as $writer)
                                    {{-- 3. The options now have the NAME as the value (for display) --}}
                                    {{-- and the ID is stored in a `data-id` attribute --}}
                                    <option data-id="{{ $writer->id }}" {{ $post->writer_id == $writer->id ? 'selected' : '' }} value="{{ $writer->name }}">
                                @endforeach
                            </datalist> -->
                            <select name="writer_id" id="writer_id">
                                @foreach ($writers as $writer)
                                    <option value="{{ $writer->id }}" {{ $post->writer_id == $writer->id ? 'selected' : '' }}>{{ $writer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- The error message now checks for 'writer_id' --}}
                        @error('writer_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- 4. Add this JavaScript to the bottom of your Blade file --}}
                    <script>
                        // Listen for input events on the visible text field
                        document.getElementById('author_name').addEventListener('input', function (e) {
                            let input = e.target,
                                list = document.getElementById(input.getAttribute('list')),
                                hiddenInput = document.getElementById('author-id'),
                                inputValue = input.value;

                            hiddenInput.value = ""; // Default to empty

                            // Find the selected option in the datalist
                            for (const option of list.options) {
                                if (option.value === inputValue) {
                                    // If a match is found, set the hidden input's value to the option's data-id
                                    hiddenInput.value = option.getAttribute('data-id');
                                    break;
                                }
                            }
                        });
                    </script>


                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea name="body" id="body" rows="3" class=" {{ $errors->has('body') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600
                                sm:text-sm/6">{{ old('body', $post->body) }}</textarea>
                        </div>
                        <p class="mt-3 text-sm/6 text-gray-600">Write the content of your post.</p>
                        @error('body')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="category" class="block text-sm/6 font-medium text-gray-900">Category</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="category" name="category" autocomplete="category"
                                class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }} </option>
                                @endforeach
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>


                    <div class="mt-6 space-y-6 col-span-full">
                        <div class="flex gap-3">
                            <div class="flex h-6 shrink-0 items-center">
                                <div class="group grid size-4 grid-cols-1">
                                    <input id="isPublished" aria-describedby="isPublished-description"
                                        name="isPublished" type="checkbox" checked
                                        class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                                    <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25"
                                        viewBox="0 0 14 14" fill="none">
                                        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-sm/6">
                                <label for="isPublished" class="font-medium text-gray-900">Is Published</label>
                                <p id="isPublished-description" class="text-gray-500">Select this option to publish your
                                    post.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-sm/6 font-semibold text-gray-900 ">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-[#3a10e5] transition-bg duration-250 ease-in-out hover:font-extrabold min-w-30 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>

