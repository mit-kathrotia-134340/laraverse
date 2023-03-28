<div class="row pt-3 justify-content-center reply-window">
    <div class="col-10 reply">
        <div class="inkit-window row justify-content-center">
            <form action="{{route('comments.store',[$tweet->id])}}" method="POST" enctype="multipart/form-data" id="commentForm">
                @csrf
                <div class="col-12 inkit-heading text-center">
                    <textarea name="comment" id="inkit-box" rows="3" placeholder="Jot Something!"></textarea>
                </div>
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <label for="comment-file-upload">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    </label>
                    <input type="file" name="comment_images" id="comment-file-upload" class="tweet-image">
                    <input type="submit" name="reply" class="inkit-button" value="Reply">
                </div>
            </form>
        </div>

    </div>
</div>
