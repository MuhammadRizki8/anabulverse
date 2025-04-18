<x-app-layout>
    <!-- Popup Success -->
    <x-success-popup />
    <!-- Jumbotron -->
    <div class="bg-red-100 py-16 mb-12">
        <div class="container mx-auto text-center px-4 sm:px-6 md:px-8">
            <h1 class="text-4xl font-extrabold text-red-600 leading-tight">
                A <span class="text-red-500">Universe</span> for your pets!
            </h1>
            <p class="mt-4 text-lg text-gray-700 max-w-2xl mx-auto">
                Share and discover amazing pets from around the world. Join us and explore a community of pet lovers!
            </p>

            <!-- Tombol untuk Post dan Browse -->
            <div class="flex justify-center space-x-6 mt-8">
                <!-- Tombol Post -->
                <a href="{{ url('/posts/create') }}" class="flex items-center px-6 py-3 bg-red-600 text-white text-lg font-medium rounded-lg shadow-md hover:bg-red-700 transition duration-300 transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Post your Pet
                </a>

                <!-- Tombol Browse -->
                <a href="{{ url('/browse') }}" class="flex items-center px-6 py-3 bg-gray-800 text-white text-lg font-medium rounded-lg shadow-md hover:bg-gray-900 transition duration-300 transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11V6l-4 4m0 0l-4-4v5m4 5h4v-5h5"></path>
                    </svg>
                    Browse Pets
                </a>
            </div>
        </div>
    </div>

    <!-- Grid of Posts -->
    <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-screen-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12 pb-8">
            @foreach($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
</x-app-layout>
