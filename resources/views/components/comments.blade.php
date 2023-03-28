@if (!$comments->isEmpty())
    <div class="row pt-3 justify-content-center comment-window">
        <div class="col-10  comments">
            @foreach ($comments as $comment)
                <div class=" row comment justify-content-evenly">
                    <div class="col-1">
                        <img src="{{ $comment->user->avatar ? asset('/storage/' . $comment->user->avatar) : asset('/images/profile.png') }}"
                            class="icon-profile rounded-circle" alt="">
                    </div>
                    <div class="col-10">
                        <div class="displayname row justify-content-between">
                            <div class="col-8">
                                <strong>{{ $comment->user->name }} </strong>
                            </div>
                            <div class="col-4 text-end">
                                @if (auth()->user()->id == $comment->user->id)
                                    <form action="/comments/delete/{{ $comment->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete-comment">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <p class="comment-username">{{ $comment->user->username }}</p>
                        <p class="ink-text">{{ $comment->comment }}</p>
                        @if ($comment->comment_images)
                            <img src="{{ asset('/storage/' . $comment->comment_images) }}" class="tweet-images  "
                                alt="">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endif
