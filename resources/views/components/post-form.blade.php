<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2" 
                   required>
        </div>

        <!-- Upload Image -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Upload Image</label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(event)" required />
                </label>
            </div>
            <img id="imagePreview" class="mt-3 hidden rounded shadow-md w-48">
        </div>

        <!-- Caption -->
        <div>
            <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
            <textarea name="caption" id="caption" rows="4" 
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2" 
                      required></textarea>
        </div>

        <!-- Submit -->
        <button type="submit" 
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">
            Save Post
        </button>
    </form>

    <script>
        function previewImage(event) {
            let reader = new FileReader();
            reader.onload = function() {
                let output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</div>
