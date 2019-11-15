@extends('template')



@section('title', ' - Blogs')


@section('content')
    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- shop-sidebar start -->
                    <div class="shop-sidebar mb-30">
                        <h4 class="title">SORT</h4>
                        <!-- filter-price-content start -->
                        <div class="filter-price-content">
                            <select class="nice-select" name="sortby" id="sortby">
                                <option value="false">New first</option>
                                <option value="true" @if($isOldFirst) selected @endif>Old first</option>

                            </select>
                            <select class="nice-select" name="quantity" id="quantity">
                                <option value="10" hidden="" selected>Quantity of results
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <!-- filter-price-content end -->
                    </div>
                    <!-- shop-sidebar end -->
                    <div class="filter-price-cont">
                        <a class="add-to-cart-button" onclick="getBlogList()">
                            <span>ACCEPT</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 order-lg-2 order-1" id="post-list">
                    @include('pages.blogs.parts.blogList', [
                        'postList' => $postList,
                        'currentPage' => $currentPage,
                        'pagesQuantity' => $pagesQuantity,
                        'pageSize' => $pageSize
                    ])
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
