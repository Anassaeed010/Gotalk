<x-layouts.default>
  <!-- Navbar -->
  <nav class="navbar bg-black text-white rounded-box justify-between gap-4 shadow-base-300/20 shadow-sm">
    <!-- Navbar Start -->
    <div class="navbar-start">
      <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:9]">
        <button id="dropdown-name" type="button"
          class="dropdown-toggle btn btn-text btn-circle dropdown-open:bg-gray-800/20 dropdown-open:text-white"
          aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
          <span class="icon-[tabler--menu-2] size-5"></span>
        </button>
      </div>
    </div>
 
    <!-- Navbar Center -->
    <div class="navbar-center flex items-center justify-center">
      <a href="{{ route('home') }}" class="text-4xl md:text-6xl font-extrabold no-underline
            bg-clip-text text-transparent
            bg-gradient-to-r from-purple-500 via-pink-500 to-yellow-400
            drop-shadow-[0_5px_10px_rgba(0,0,0,0.4)]
            tracking-tight
            transition-transform duration-300 hover:scale-105" style="font-family: 'Tajawal', sans-serif;">
        تَكَلَّم
      </a>
    </div>

    <!-- Navbar End -->
    <div class="navbar-end flex items-center gap-4">
      @if(Auth::check())
      <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
        <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center" aria-haspopup="menu"
          aria-expanded="false" aria-label="Dropdown">
          <div class="avatar">
            <div class="size-9.5 rounded-box">
              <img src="/storage/{{ Auth::user()->avatar }}" alt="avatar 1" />
            </div>
          </div>
        </button>
      </div>
      @endif

      <button class="btn btn-sm btn-text btn-circle size-8.5" aria-label="Search Button">
        <span class="icon-[tabler--search] size-5.5"></span>
      </button>
    </div>
  </nav>

  <!-- Sidebar -->
  <aside id="sidebarMenu"
    class="fixed top-0 right-0 h-full w-64 bg-gray-900 bg-opacity-95 backdrop-blur-sm rounded-l-2xl shadow-lg p-6 pt-24 flex flex-col gap-4 z-40 transform translate-x-full transition-transform duration-300">
    <ul class="flex flex-col gap-3">
      <li>
        <a href="{{ route('home') }}" method="get"
          class="flex items-center gap-2 font-semibold text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition">
          🏠 الرئيسية
        </a>
      </li>
      <li>
        <a href="{{ route('explore') }}"
          class="flex items-center gap-2 font-semibold text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition">
          🔍 استكشاف
        </a>
      </li>

      @guest
      <li>
        <a href="{{ route('login') }}"
          class="flex items-center gap-2 font-semibold text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition">
          👤 تسجيل دخول
        </a>
      </li>
      @endguest

      @auth
      <li>
        <form method="post" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="flex items-center gap-2 font-semibold text-white px-4 py-3 w-full text-left rounded-lg hover:bg-purple-700 transition">
            🚪 تسجيل خروج
          </button>
        </form>
      </li>
      @endauth
    </ul>
  </aside>

  <!-- زر فتح/إغلاق السايدر -->
  <button id="menuToggle" class="fixed top-6 right-6 text-2xl z-50 text-white">☰</button>

  {{ $slot }}

  <!-- التغريدات -->
  @if(!empty($tweets) && $tweets->count())
    <div class="space-y-4 mt-4">
      @foreach($tweets as $tweet)
        <div class="bg-gray-800 p-4 rounded-lg hover:bg-gray-700 transition shadow-lg">
          <p class="text-white">{{ $tweet->content }}</p>
          <span class="text-xs text-gray-400">{{ $tweet->created_at->diffForHumans() }}</span>
        </div>
      @endforeach
    </div>
  @endif

  <!-- نموذج التغريدة أسفل الشاشة -->
  @auth
  <form method="post" action="{{ route('tweet.create') }}"
    class="fixed bottom-4 left-0 w-full max-w-xl mx-auto p-2 bg-gray-900 rounded-xl shadow-lg flex gap-2 items-center z-50">
    @csrf
    <!-- هنا التعديل: نخلي الفورم يعرف لو المستخدم في صفحة تغريدة -->
    <input type="hidden" name="parent_tweet_id" value="{{ request()->tweet?->id }}" />

    <textarea name="content" rows="1" required placeholder="اكتب تغريدة..."
      class="flex-1 resize-none bg-gray-800 rounded-lg p-2 text-white border-none focus:outline-none"></textarea>
    <button type="submit" class="bg-purple-500 hover:bg-purple-600 p-2 rounded-lg text-white font-bold">
      🚀
    </button>
  </form>
  @endauth

  <!-- سكربت الفتح/الإغلاق -->
  <script>
    const toggleBtn = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebarMenu');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('translate-x-full');
    });
  </script>

</x-layouts.default>
