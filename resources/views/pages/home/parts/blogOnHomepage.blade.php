<!-- Blog Area Start -->
<div class="blog-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="section-title text-center">
                    <h2><span>Latest</span> Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($latestPosts as $post)
            <div class="col-lg-6 col-md-6">
                <!-- single-blog Start -->
                <div class="single-blog mt-30">
                    <div class="blog-image">
                        <a href="/post/{{$post->getDataElement('id')}}">
                            <img src="/assets/images/blog/{{$post->getDataElement('image')}}" alt="">
                        </a>
                        <div class="meta-tag">
                            <p>{{$post->getDataElement('published_at')}}</p>
                        </div>
                    </div>

                    <div class="blog-content">
                        <h4><a href="/post/{{$post->getDataElement('id')}}">{{$post->getDataElement('title')}}</a></h4>
                        <p>{{$post->getDataElement('short')}}</p>
                        <div class="read-more">
                            <a href="/post/{{$post->getDataElement('id')}}">READ MORE</a>
                        </div>
                    </div>
                </div>
                <!-- single-blog End -->
            </div>
            @endforeach
            @includeWhen(count($latestPosts) == 0, 'pages.home.parts.noPosts')
        </div>
    </div>
</div>
<!-- Blog Area End -->