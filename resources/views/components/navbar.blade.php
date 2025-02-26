<nav class="bg-red-100 fixed w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="AnabulVerse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">AnabulVerse</span>
        </a>
        
        <!-- Right side: Menu and buttons -->
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <!-- Post Button -->
            <a href="{{ url('/posts/create') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                Post
            </a>

            <!-- Mobile menu toggle button -->
            <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        
        <!-- Main navigation menu (hidden on mobile) -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  md:dark:bg-gray-900">
                <li>
                    <a href="{{ url('/') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 md:dark:hover:bg-transparent">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/browse') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 md:dark:hover:bg-transparent">
                        Browse
                    </a>
                </li>
                <li>
                    <a href="{{ url('/popular') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 md:dark:hover:bg-transparent">
                        Popular
                    </a>
                </li>
                <li>
                    <a href="{{ url('/help') }}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-red-500 md:dark:hover:bg-transparent">
                        Help
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- JavaScript for toggle menu -->
<script>
    const menuToggleButton = document.getElementById('menu-toggle');
    const menu = document.getElementById('navbar-sticky');

    menuToggleButton.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
