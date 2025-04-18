<footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 mt-10">
    <div class="max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center mb-4 md:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo.png') }}" class="h-8" alt="AnabulVerse Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">AnabulVerse</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li><a href="{{ url('/about') }}" class="hover:underline me-4 md:me-6">About</a></li>
                <li><a href="{{ url('/privacy') }}" class="hover:underline me-4 md:me-6">Privacy Policy</a></li>
                <li><a href="{{ url('/licensing') }}" class="hover:underline me-4 md:me-6">Licensing</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:underline">Contact</a></li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">
            © {{ date('Y') }} <a href="{{ url('/') }}" class="hover:underline">AnabulVerse™</a>. All Rights Reserved.
        </span>
    </div>
</footer>
