<div class="blog-post">
    <div class="blog-post-title">
        <a href="/posts/{{$post->id}}">
        <h2>{{ $post->title }}</h2>
        </a>
    </div>




    <p class="blog-post-meta">
        {{ $post->user['name'] }} on
        {{ $post->created_at->toFormattedDateString() }}
    </p>


    {{ $post->body }}

    </div><!-- /.blog-post -->