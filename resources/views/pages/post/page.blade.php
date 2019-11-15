@extends('template')



@section('title', ' - BlogDetails')



@section('content')
    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-lg-2 oreder-2 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-12 blog-details-area">
                            <div class="blog-details-image mt-30">
                                <img src="/assets/images/blog/{{$postModel->getDataElement('image')}}" alt="">
                            </div>
                            <div class="our-blog-contnet">
                                <h5>
                                    <a href="/post/{{$postModel->getDataElement('id')}}">
                                        {{$postModel->getDataElement('title')}}
                                    </a>
                                </h5>
                                <div class="post_meta">
                                    <ul>
                                        <li>
                                            <p>{{$postModel->getDataElement('published_at')}}</p>
                                        </li>
                                    </ul>
                                </div>
                                <p>{{$postModel->getDataElement('content')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection