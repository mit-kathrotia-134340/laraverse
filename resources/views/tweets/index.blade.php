<x-base>
    <x-layout>
        @auth
            <x-timeline>
                @empty(!$tweets)
                    @foreach ($tweets as $tweet)
                        <x-ink :tweet="$tweet" />
                    @endforeach
                @endempty
            </x-timeline>

            <x-profile />
        @else
            {{-- <x-ink/> --}}
            <x-guest />
        @endauth

    </x-layout>
</x-base>
