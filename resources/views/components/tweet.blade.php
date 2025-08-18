@props(['tweet'])

<div class="card bg-gray-900 rounded-lg shadow-lg">
    <div class="card-body py-4 px-7">
        @if($tweet->parentTweet)
            <div class="text-sm text-purple-400 mb-2">
                رد من {{ $tweet->parentTweet->user->name }}
            </div>
        @endif

        <p class="text-white">{{ $tweet->content }}</p>
        <span class="text-xs text-gray-400">{{ $tweet->created_at->diffForHumans() }}</span>
    </div>

    <div class="card-actions p-4 pt-0 flex justify-between items-center">
        <!-- زر الرد (ينقلك لعرض التغريدة) -->
        <a 
            @if ($tweet->id == request()->tweet?->id) disabled @endif
            href="{{ route('tweet.view', $tweet->baseTweet->id) }}" 
            class="flex items-center gap-1 px-3 py-1 bg-white text-gray-900 font-bold text-sm rounded-md shadow-md hover:bg-gray-100 hover:scale-105 transition-all duration-200"
        >
            <span>رد</span>
            <span class="icon-[tabler--message] size-4"></span>
        </a>

        <!-- المستخدم -->
        <a class="flex btn btn-text items-center gap-2">
            <div>{{ $tweet->user->name }}</div>
            <div class="avatar">
                <div class="size-6 rounded-box">
                    <img src="/storage/{{ $tweet->user->avatar }}" alt="avatar" />
                </div>
            </div>
        </a>
    </div>
</div>

<!-- الردود (فقط في صفحة العرض) -->
@if (request()->routeIs('tweet.view'))
    <div class="ms-6 ps-2 space-y-2 border-s-2">
        @foreach ($tweet->childTweets as $childTweet)
            <x-tweet :tweet="$childTweet" />
        @endforeach
    </div>
@endif
