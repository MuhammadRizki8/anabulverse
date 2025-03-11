@props(['message'])

@if(session('success'))
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 3000)" 
         x-show="show"
         x-transition
         class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50">
        {{ session('success') }}
    </div>
@endif
