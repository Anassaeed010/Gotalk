

<x-layouts.default>
  
      <div class="flex flex-col justify-center items-center min-h-[100vh]">
    <div class="mb-12">
        <span class="text-9xl font-extrabold text-transparent bg-clip-text
                     bg-gradient-to-r from-purple-600 via-orange-500 to-yellow-300
                     border-2 border-gray-900/80 rounded-full 
                     px-24 py-6 shadow-xl shadow-black/50
                     drop-shadow-lg">
            تَكَلَّم
        </span>
    </div>

    <div>
        {{ $slot }}
    </div>
</div>






</x-layouts.default>
