@props(['tweet'])

<div class="col-11 ink">
    <div class="row">

        <div class="col-1 ">
            <img src="{{ $tweet->user->avatar ? asset('/storage/' . $tweet->user->avatar) : asset('/images/profile.png') }}"
                class="icon-profile rounded-circle" alt="">
        </div>
        <div class="col-10">
            <span class="displayname"><strong>{{ $tweet->user->name }}</strong></span>

            <p class="username">{{ $tweet->user->username }}</p>
            <p class="ink-text">{{ $tweet->tweet }} </p>
            @if ($tweet->tweet_images)
                <img src="{{ asset('/storage/' . $tweet->tweet_images) }}" class="tweet-images  " alt="">
            @endif
            <div class="like-reply d-flex justify-content-between align-items-baseline">
                <form action="{{route('likes',[$tweet->id])}}" method="POST">
                @csrf
                    <button type="submit" class="like-tweet">
                        @if ($tweet->liked(auth()->user())->count()==1)

                        <i class="fa fa-heart like-icon" aria-hidden="true"> {{$tweet->likes->count()}}</i>
                        @else
                        <i class="fa fa-heart like-icon text-cdark" aria-hidden="true"> {{$tweet->likes->count()}}</i>

                        @endif
                    </button>
                </form>
                <i class="fa fa-reply reply-icon" aria-hidden="true"> reply </i>
                <i class="fa fa-comments comment-icon" aria-hidden="true"> {{$tweet->comment->count()}}</i>
                @if (auth()->user()->id == $tweet->user->id)
                    <form action="/tweets/delete/{{ $tweet->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-tweet">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <x-comments :comments="$tweet->comment"/>
    <x-reply :tweet="$tweet"/>

</div>
