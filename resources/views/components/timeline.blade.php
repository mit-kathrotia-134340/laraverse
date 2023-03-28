<div class="timeline col-12 col-lg-8">

    <div class="inkit-window row justify-content-center">
        <form action="/tweets/store" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-12 inkit-heading text-center">
                <textarea name="tweet" id="inkit-box" rows="3" placeholder="Jot Something!"></textarea>

            </div>
            <div class="col-12 d-flex justify-content-between align-items-center">


                    <label for="file-upload">
                        <i class="fa fa-file-image-o" aria-hidden="true">
                        </i>
                    </label>
                <input type="file" name="tweet_images" id="file-upload" class="tweet-image">


                <div>
                    @error('tweet')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    @error('tweet_images')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>


                    <input type="submit" name="submit" class="inkit-button" value="Ink It">

            </div>
        </form>
    </div>
    <div class="content row justify-content-center">

        {{ $slot }}
    </div>
</div>
