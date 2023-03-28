<x-base>
    <x-layout>
        @auth
            <x-explore-page>
                <div class="content-lg-header row justify-content-evenly">
                    Explore Page
                </div>
                <div class="content-lg row justify-content-evenly">
                    @foreach ($users as $user)
                        @if (auth()->user()->follows($user))
                        @else
                            <div class="col-5 explore-profile text-center">
                                <div class="explore-profile-bg d-flex justify-content-center">
                                    <img src="{{ $user->avatar ? asset('/storage/' . $user->avatar) : asset('/images/profile.png') }}"
                                        alt="" class="explore-profile-pic rounded-circle">

                                </div>
                                <p class="explore-profile-name">{{ $user->name }}</p>
                                <p class="explore-profile-username"> {{ '@' . $user->username }}</p>

                                <form action="{{ route('follow', [$user->id]) }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Follow" class="explore-profile-btn">
                                </form>
                            </div>
                        @endif
                    @endforeach
                </div>
            </x-explore-page>

            <x-profile />
        @else
            {{-- <x-ink/> --}}
            <x-guest />
        @endauth
    </x-layout>
</x-base>
