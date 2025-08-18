<x-layouts.default>
<!-- Navbar + Sidebar جاهز لصفحة الاستكشاف -->
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
      <a href="{{ route('home') }}" class="flex items-center gap-2 font-semibold text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition">
        🏠 الرئيسية
      </a>
    </li>
    <li>
      <a href="{{ route('explore') }}" class="flex items-center gap-2 font-semibold text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition">
        🔍 استكشاف
      </a>
    </li>

    @guest
    <li>
      <a href="{{ route('login') }}" class="flex items-center gap-2 font-semibold text-white px-4 py-3 rounded-lg hover:bg-purple-700 transition">
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

<!-- سكربت الفتح/الإغلاق -->
<script>
  const toggleBtn = document.getElementById('menuToggle');
  const sidebar = document.getElementById('sidebarMenu');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('translate-x-full');
  });
</script>

  <!-- خلفية زجاجية عصرية -->
  <div class="min-h-screen bg-gradient-to-br from-slate-900 via-black to-slate-800 text-white relative overflow-hidden">

    <!-- العنوان الرئيسي -->
    <div class="flex justify-center py-12">
      <h1 class="text-5xl md:text-6xl font-extrabold elegant-shadow tracking-wide">
        قادم قريباً
      </h1>
    </div>

    <!-- Tabs Buttons -->
    <div class="flex justify-center flex-wrap gap-4 px-6">
      @php
        $categories = [
          '📰 أخبار',
          '🤝 اجتماعي',
          '🎬تلفاز ' ,
          '💻 تقنية',
          '🎭 متعة',
          '🌍 ثقافة'
        ];
      @endphp

      @foreach($categories as $cat)
        <button class="category-card px-6 py-2 rounded-full font-semibold transition relative">
          {{ $cat }}
        </button>
      @endforeach
    </div>

 





    <!-- المحتوى -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 px-6">

      <!-- الكارد الأول: Dexter -->
      <div class="content-card bg-white/5 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg border border-white/10 group transition hover:scale-105 hover:shadow-purple-500/20">
        <div class="overflow-hidden h-48">
          <img src="https://comicbook.com/wp-content/uploads/sites/4/2025/04/Dexter-Resurrection-Michael-C-Hall.jpg"
               alt="Dexter New Blood"
               class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
        </div>
        <div class="p-5 space-y-3">
          <h2 class="text-xl font-bold">عودة مسلسل Dexter 🔪</h2>
          <p class="text-sm text-gray-300">
            بعد موسم New Blood، تعود شخصية Dexter في **Resurrection** بمغامرات مشوقة لعشاق الغموض والإثارة.
          </p>
          <button class="mt-3 text-sm font-semibold text-purple-400 group-hover:text-purple-300 transition">
            اقرأ المزيد →
          </button>
        </div>
      </div>

      <!-- الكارد الثاني: أخبار تقنية -->
      <div class="content-card bg-white/5 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg border border-white/10 group transition hover:scale-105 hover:shadow-purple-500/20">
        <div class="overflow-hidden h-48">
          <img src="https://tse4.mm.bing.net/th/id/OIP.8uwM8rB40P1_qkbXfzBucQHaEK?rs=1&pid=ImgDetMain&o=7&rm=3"
               alt="AI & ChatGPT"
               class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
        </div>
        <div class="p-5 space-y-3">
          <h2 class="text-xl font-bold">تحديث ChatGPT الجديد 🤖</h2>
          <p class="text-sm text-gray-300">
            أعلنت OpenAI عن تحديثات قوية للذكاء الاصطناعي ChatGPT مع إمكانيات فهم أعمق وسرعة أكبر في الردود.
          </p>
          <button class="mt-3 text-sm font-semibold text-purple-400 group-hover:text-purple-300 transition">
            اقرأ المزيد →
          </button>
        </div>
      </div>

      <!-- الكارد الثالث: أخبار تقنية حقيقية -->
      <div class="content-card bg-white/5 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg border border-white/10 group transition hover:scale-105 hover:shadow-purple-500/20">
        <div class="overflow-hidden h-48">
          <img src="https://tse2.mm.bing.net/th/id/OIP.dT7tfJOQvMP6bQ9SldmRqgHaEg?rs=1&pid=ImgDetMain&o=7&rm=3"
               alt="Tesla Electric Car"
               class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
        </div>
        <div class="p-5 space-y-3">
          <h2 class="text-xl font-bold">تسلا تكشف عن سيارتها الكهربائية الجديدة ⚡</h2>
          <p class="text-sm text-gray-300">
            أعلنت Tesla عن موديل جديد كهربائي بالكامل، مع أداء محسّن ومدى أكبر للشحن، مخصص لعشاق السيارات المستقبلية.
          </p>
          <button class="mt-3 text-sm font-semibold text-purple-400 group-hover:text-purple-300 transition">
            اقرأ المزيد →
          </button>
        </div>
      </div>

      <!-- الكارد الرابع: أخبار تقنية -->
      <div class="content-card bg-white/5 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg border border-white/10 group transition hover:scale-105 hover:shadow-purple-500/20">
        <div class="overflow-hidden h-48">
          <img src="https://th.bing.com/th/id/OIP.QnfYTzScgOZ31LRuw3MqLwHaEl?w=277&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3"
               alt="SpaceX Starship"
               class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
        </div>
        <div class="p-5 space-y-3">
          <h2 class="text-xl font-bold">SpaceX تستعد لإطلاق Starship 🚀</h2>
          <p class="text-sm text-gray-300">
            أعلنت SpaceX عن موعد إطلاق Starship الجديد، مع أهداف مهمة للرحلات المستقبلية إلى القمر والمريخ.
          </p>
          <button class="mt-3 text-sm font-semibold text-purple-400 group-hover:text-purple-300 transition">
            اقرأ المزيد →
          </button>
        </div>
      </div>

      <!-- الكارد الخامس والسادس: محتوى اجتماعي وثقافي تجريبي -->
      @foreach (range(5,6) as $i)
        <div class="content-card bg-white/5 backdrop-blur-xl rounded-2xl overflow-hidden shadow-lg border border-white/10 group transition hover:scale-105 hover:shadow-purple-500/20">
          <div class="overflow-hidden h-48">
            <img src="https://th.bing.com/th?id=OIF.krZ9Y6bZ9eAkHdDe%2bovuDA&w=271&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3={{ $i }}" alt="demo"
                 class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
          </div>
          <div class="p-5 space-y-3">
            <h2 class="text-xl font-bold">عنوان محتوى {{ $i }}</h2>
            <p class="text-sm text-gray-300">
             13 أغسطس 2025
أعلنت شركة ثمانية عن إطلاق تطبيقها الجديد في 13 أغسطس 2025، والذي سيتيح بث جميع مباريات الدوري السعودي (دوري روشن) وكأس الملك ودوري يلو مجانًا. التطبيق سيتوفر على أنظمة iOS وAndroid وApple TV وAndroid TV، بالإضافة إلى الشاشات الذكية من سامسونج وإل جي. كما ستوفر ثمانية باقات اشتراك تبدأ من 58 ريالًا شهريًا، تشمل جودة أعلى وبرامج تحليلية وإحصائيات معلوماتية</p>
            <button class="mt-3 text-sm font-semibold text-purple-400 group-hover:text-purple-300 transition">
              اقرأ المزيد →
            </button>
          </div>
        </div>
      @endforeach

    </div>

  </div>








  <!-- ستايلات خاصة -->
  <style>
    /* تأثير النص المتدرج المتحرك */
    .elegant-shadow {
      background: linear-gradient(90deg, #a855f7, #ec4899, #fbbf24);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-size: 200% auto;
      animation: gradientMove 4s infinite linear;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      100% { background-position: 200% 50%; }
    }

    /* أزرار التصنيفات */
    .category-card {
      border: 2px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.05);
      color: white;
      backdrop-filter: blur(12px);
    }
    .category-card:hover {
      background: linear-gradient(135deg, rgba(168,85,247,0.4), rgba(236,72,153,0.4));
      border-color: rgba(255,255,255,0.3);
    }
  </style>

</x-layouts.default>
