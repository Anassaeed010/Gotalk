@props(['tweet'])

<div class="card bg-gray-900 rounded-2xl shadow-lg overflow-hidden w-full max-w-xl mx-auto mb-2">

    <!-- محتوى التغريدة -->
    <div class="card-body py-4 px-6">
        <p class="text-white">{{ $tweet->content }}</p>
    </div>

    <!-- زر الرد وبيانات المستخدم -->
    <div class="card-actions p-4 pt-0 flex justify-between items-center">
        <a 
            href="{{ route('tweet.view', $tweet->id) }}" 
            class="flex items-center gap-1 btn btn-xs bg-white text-black hover:bg-gray-200 px-2 py-1 rounded"
        >
            <span class="icon-[tabler--message] size-4"></span>
            <span class="text-sm font-semibold">رد</span>
        </a>

        <!-- بيانات المستخدم -->
        <a class="flex items-center gap-2">
            <div class="text-white font-semibold">{{ $tweet->user->name }}</div>
            <div class="avatar">
                <div class="w-8 h-8 rounded-full overflow-hidden">
                    <img src="/storage/{{ $tweet->user->avatar ?? 'default.png' }}" alt="avatar" />
                </div>
            </div>
        </a>
    </div>

    <!-- الردود (داخل الكارد فقط عند صفحة العرض) -->
    @if(request()->routeIs('tweet.view') && $tweet->childTweets && $tweet->childTweets->count())
        <div class="ms-6 ps-2 space-y-2 border-l-2 border-gray-700">
            @foreach ($tweet->childTweets as $childTweet)
                <div class="flex flex-col gap-1">
                    <!-- اسم صاحب الرد داخل كارد الرد -->
                    <div class="text-gray-400 text-sm ml-2">رد بواسطة: <span class="font-semibold text-white">{{ $childTweet->user->name }}</span></div>
                    <x-tweet :tweet="$childTweet" />
                </div>
            @endforeach
        </div>
    @endif

</div>
