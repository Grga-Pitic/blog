<!-- shop-product-wrapper start -->
<div class="blog-product-wrapper">
    <div class="row">
        @foreach($postList as $post)
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
    </div>

    <!-- paginatoin-area start -->
    <div class="paginatoin-area">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <ul class="pagination-box">
                    @if($currentPage != 0)
                        <li><a class="Previous" href="#"><i class="ion-chevron-left"></i></a>
                        </li>
                    @endif
                    @for($i = 0; $i < $currentPage; $i++)
                        <li><a onclick="getBlogList({{$i}}, {{$pageSize}})">{{$i+1}}</a></li>
                    @endfor
                    <li class="active"><a>{{$currentPage+1}}</a></li>
                    @for($i = $currentPage + 1; $i < $pagesQuantity; $i++)
                        <li><a onclick="getBlogList({{$i}}, {{$pageSize}})">{{$i+1}}</a></li>
                    @endfor
                    @if(($currentPage != $pagesQuantity-1) and ($pagesQuantity != 0))
                        <li><a class="Next" href="#"><i class="ion-chevron-right"></i> </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- paginatoin-area end -->
</div>
<!-- shop-product-wrapper end -->