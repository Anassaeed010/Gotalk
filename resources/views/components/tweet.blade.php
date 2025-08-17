@props([
    'tweet'  
])

@if ($tweet)
<div class="card">
    <div class="card-body py-4 px-7">
        <p>{{ $tweet->content }}</p>
    </div>
    <div class="card-actions p-4 pt-0 flex justify-between items-center">
        <a 
            @if ($tweet?->id == request()->tweet?->id)
                disabled
            @endif
            href="{{ route('tweet.view', $tweet->baseTweet?->id ?? $tweet->id) }}" 
            class="btn btn-text btn-square"
        >
            <span class="icon-[tabler--message]"></span>
        </a>

        @if($tweet->user)
        <a class="flex btn btn-text">
            <div>
                {{ $tweet->user->name ?? 'مستخدم مجهول' }}
            </div>
            <div class="avatar">
                <div class="size-6 rounded-box">
                    <img src="/storage/{{ $tweet->user->avatar ?? 'default.png' }}" alt="avatar" />
                </div>
            </div>
        </a>
        @endif
    </div>
</div>

@if (request()->routeIs('tweet.view') && $tweet->childTweets)
    <div class="ms-6 ps-2 space-y-2 border-s-2">
        @foreach ($tweet->childTweets as $childTweet)
            <x-tweet :tweet="$childTweet" />
        @endforeach
    </div>
@endif
@endif
