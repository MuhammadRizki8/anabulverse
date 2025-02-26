<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Create New Post</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-lg">
            <thead class="bg-gray-100">
                <tr class="text-left">
                    <th class="px-6 py-3 border-b">Title</th>
                    <th class="px-6 py-3 border-b">Image</th>
                    <th class="px-6 py-3 border-b">Caption</th>
                    <th class="px-6 py-3 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 border-b">{{ $post->title }}</td>
                        <td class="px-6 py-3 border-b">
                            <!-- Thumbnail dengan klik untuk modal -->
                            <img src="{{ asset('storage/' . $post->image_url) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-24 h-24 object-cover rounded cursor-pointer hover:opacity-80"
                                 onclick="showModal('{{ asset('storage/' . $post->image_url) }}')">
                        </td>
                        <td class="px-6 py-3 border-b">{{ $post->caption }}</td>
                        <td class="px-6 py-3 border-b">
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal untuk menampilkan gambar besar -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center">
    <div class="relative">
        <img id="modalImage" class="max-w-full max-h-[90vh] rounded-lg">
        <button onclick="closeModal()" class="absolute top-2 right-2 bg-white rounded-full px-2 py-1 text-black">✕</button>
    </div>
</div>

<script>
    function showModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('imageModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>
</x-app-layout>
