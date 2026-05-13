<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- @if (session('success'))
                        <div id="flash-message" class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-800 dark:bg-green-900 dark:text-green-100">
                            {{ session('success') }}
                        </div>
                    @endif -->

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-5">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('title') border-red-500 @enderror"
                                placeholder="Enter post title"
                            >
                            @error('title')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Category --}}
                        <div class="mb-5">
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="category"
                                name="category"
                                required
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('category') border-red-500 @enderror"
                            >
                                <option value="">— Select a category —</option>
                                <option value="technology"  {{ old('category') == 'technology'  ? 'selected' : '' }}>Technology</option>
                                <option value="design"      {{ old('category') == 'design'      ? 'selected' : '' }}>Design</option>
                                <option value="science"     {{ old('category') == 'science'     ? 'selected' : '' }}>Science</option>
                                <option value="culture"     {{ old('category') == 'culture'     ? 'selected' : '' }}>Culture</option>
                                <option value="politics"    {{ old('category') == 'politics'    ? 'selected' : '' }}>Politics</option>
                                <option value="photography" {{ old('category') == 'photography' ? 'selected' : '' }}>Photography</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Cover Image --}}
                        <!-- <div class="mb-5">
                            <label for="cover_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Cover Image <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="file"
                                id="cover_image"
                                name="cover_image"
                                accept="image/*"
                                required
                                class="w-full text-sm text-gray-700 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900 dark:file:text-indigo-300 @error('cover_image') border border-red-500 rounded-md @enderror"
                            >
                            @error('cover_image')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div> -->

                        {{-- Body --}}
                        <div class="mb-5">
                            <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Content <span class="text-red-500">*</span>
                            </label>
                            <textarea
                                id="body"
                                name="body"
                                rows="10"
                                required
                                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('body') border-red-500 @enderror"
                                placeholder="Write your post content here…"
                            >{{ old('body') }}</textarea>
                            @error('body')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="flex items-center gap-3">
                            <button
                                type="submit"
                                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-md transition"
                            >
                                Publish Post
                            </button>
                            <button
                                type="reset"
                                class="px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-semibold rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                            >
                                Reset
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const flash = document.getElementById('flash-message');
                if (flash) {
                    setTimeout(() => {
                        flash.style.transition = 'opacity 0.4s ease';
                        flash.style.opacity = '0';
                    }, 4500);
                }
            });
        </script>
    @endif -->
</x-app-layout>
