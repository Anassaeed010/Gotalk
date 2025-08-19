<x-layouts.app>
    <div class="flex flex-col items-center mt-6 space-y-4">
        @foreach($tweets as $tweet)
            @if(is_null($tweet->parent_tweet_id)) <!-- فقط التغريدات الرئيسية -->
                <x-tweet :tweet="$tweet" />
            @endif
        @endforeach
    </div>
</x-layouts.app>
