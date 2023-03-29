<x-base>
    <x-layout>
        @auth
            <x-explore-page>
                <div class="content-lg-header row justify-content-evenly">
                    Notification
                </div>
                <div class="content-lg row justify-content-evenly">
                    @empty(!$notifications)
                        @foreach ($notifications as $notification)
                            <div class="col-11 notif">
                                <div class="row">
                                    <div class="col-1 ">
                                        <img src="{{ $notification->user->avatar ? asset('/storage/' . $notification->user->avatar) : asset('/images/profile.png') }}"
                                            class="notif-profile rounded-circle" alt="">
                                    </div>

                                    <div class="col-6">
                                        <p class="notif-tag"><strong>{{ $notification->user->username }} </strong>
                                            {{$notification->notification}}
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p class="notif-tag"><em>{{ $notification->created_at->format('d/m/Y H:i') }} </em>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endempty
                </div>
            </x-explore-page>

            <x-profile />
        @else
            {{-- <x-ink/> --}}
            <x-guest />
        @endauth
    </x-layout>
</x-base>
