@extends('layouts.frontend')

@section('page-content')
    <div class="featured-image clearfix">
        @if (count($categories))
        <img class="img-responsive" src="{{ route('image', $categories->first()->banner_default) }}" alt="" />
        @endif
    </div>
    <div class="page-title-block clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="page-title title-one-full">
                        <span>{{ $item->name }}</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="single-product-container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="product-single-top">
                        <div class="product-gallery">
                            <div class="product-photo">
                                <?php $html = ''; ?>
                                @if (count($item->images))
                                @foreach ($item->images as $image)
                                <figure>
                                    <a class="item" href="{{ route('image', $image->image_large) }}" data-size="800x600">
                                        <img src="{{ route('image', $image->image_large) }}" alt="image">
                                    </a>
                                </figure>
                                <?php
                                    $html .='
                                        <div class="item">
                                            <img src="' . route('image', $image->image_thumbnail) . '" alt="image_thumbnail">
                                        </div>
                                    ';
                                ?>
                                @endforeach
                                @endif
                            </div>
                            <div class="product-thumbs">
                                {!! $html !!}
                            </div>
                        </div>
                    </div>
                    <div class="product-single-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            @if ($item->information)
                            <li class="active" role="presentation">
                                <a href="#product-info" aria-controls="product-info" role="tab" data-toggle="tab" aria-expanded="false">Thông số kỹ thuật</a>
                            </li>
                            @endif

                            @if ($item->advantage)
                            <li role="presentation">
                                <a href="#product-advantage" aria-controls="product-advantage" role="tab" data-toggle="tab" aria-expanded="false">Ưu điểm</a>
                            </li>
                            @endif

                            @if ($item->coordination)
                            <li role="presentation">
                                <a href="#setup-formality" aria-controls="setup-formality" role="tab" data-toggle="tab" aria-expanded="true">Các hình thức lắp đặt </a>
                            </li>
                            @endif

                            @if ($item->conduct)
                            <li role="presentation">
                                <a href="#setup-step" aria-controls="setup-step" role="tab" data-toggle="tab" aria-expanded="false">Các bước lắp đặt</a>
                            </li>
                            @endif

                            @if ($item->produce)
                            <li role="presentation">
                                <a href="#product-process" aria-controls="product-process" role="tab" data-toggle="tab" aria-expanded="false">Dây chuyền sản xuất</a>
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            @if ($item->information)
                            <div class="tab-pane active" id="product-info" role="tabpanel">
                               {!! $item->information !!}
                            </div>
                            @endif

                            @if ($item->advantage)
                            <div class="tab-pane active" id="product-advantage" role="tabpanel">
                               {!! $item->advantage !!}
                            </div>
                            @endif

                            @if ($item->coordination)
                            <div class="tab-pane" id="setup-formality" role="tabpanel">
                                {!! $item->coordination !!}
                            </div>
                            @endif

                            @if ($item->conduct)
                            <div class="tab-pane" id="setup-step" role="tabpanel">
                                {!! $item->conduct !!}
                            </div>
                            @endif

                            @if ($item->produce)
                            <div class="tab-pane" id="product-process" role="tabpanel">
                                {!! $item->produce !!}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="fb-comments" data-href="{{ Request::url()}}" data-width="100%" data-numposts="5"></div>
                </div>
                <aside class="sidebar sidebar-shop col-xs-12 col-sm-12 col-md-4">
                    <div class="sidebar-inner">
                        @if (count($categories))
                        @foreach ($categories as $category)
                        <div class="block block-news">
                            <h3 class="block-title title-two">
                                <span>{{ $category->name }}</span>
                            </h3>
                            <div class="block-content">
                                @if ($category->productPosts)
                                @foreach ($category->productPosts as $post)
                                <div class="box-list undefined">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="box-list-img" href="{{ route('post.show', $post->slug) }}" title="{{ $post->name }}">
                                                <img class="img-responsive" src="{{ route('image', $post->image_156x100) }}" alt="{{ $post->name }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="box-list-title">
                                                <a href="{{ route('post.show', $post->slug) }}" title="{ $post->name }}">{{ $post->name }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <button class="pswp__counter"></button>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!-- button.pswp__button.pswp__button--share(title="Share")-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('prescripts')
    <script>
        (function(d, s, id)
        {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=590749964645815';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endpush
