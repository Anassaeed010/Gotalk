<x-layouts.app>
    <div class="space-y-2">
        @foreach ($tweets as $tweet)
            <x-tweet :tweet="$tweet" />
        @endforeach
    </div>
</x-layouts.app>