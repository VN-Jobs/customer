<div class="menu-wrapper menu-sticky menu-boxed">
    <div class="container">
        <div class="menu-container">
            <div class="container-full">
                <div class="menuzord relative" id="menuzord">
                    <a class="menuzord-brand hidden-lg hidden-md" href="{{ route('home') }}">
                        <img src="{{ route('image', $configs['logo']) }}" />
                    </a>
                    <ul class="menuzord-menu">
                        <li {{ check_active(route('home')) }}>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li {{ check_active(route('category.show', $__categoryMenu->get(0)->slug)) }}>
                            <a href="{{ route('category.show', $__categoryMenu->get(0)->slug) }}">{{ $__categoryMenu->get(0)->name }}</a>
                            @include('frontend.header._box-page', ['boxCategory' => $__categoryMenu->get(0)])
                        </li>
                        <li {{ check_active(route('category.show', $__categoryMenu->get(5)->slug)) }}>
                            <a href="{{ route('category.show', $__categoryMenu->get(5)->slug) }}">{{ $__categoryMenu->get(5)->name }}</a>
                            <div class="megamenu">
                                <div class="megamenu-inner">
                                    <div class="megamenu-row new">
                                        @if (count($__categoryPosts))
                                        @foreach ($__categoryPosts as $categoryPost)
                                        <div class="col4 col-border">
                                            <h4 class="title-new">{{ $categoryPost->name }}</h4>
                                            <div class="owl-carousel owl-new">
                                                @if ($categoryPost->limitPosts)
                                                @foreach($categoryPost->limitPosts->chunk(5) as $chunks)
                                                <div class="item">
                                                    @foreach($chunks as $chunk)
                                                    <a class="item-new" href="{{ route('post.show', $chunk->slug) }}">
                                                        <img src="{{ route('image', $chunk->image_100x70) }}" />
                                                        <div class="info">
                                                            <h5>{{ $chunk->name }}</h5>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li {{ check_active(route('category.show', $__categoryMenu->get(4)->slug)) }}>
                            <a href="{{ route('category.show', $__categoryMenu->get(4)->slug) }}">{{ $__categoryMenu->get(4)->name }}</a>
                            <div class="megamenu">
                                <div class="megamenu-inner">
                                    <div class="owl-carousel owl-product">
                                        @if ($__categoryProducts)
                                        @foreach($__categoryProducts->chunk(2) as $chunks)
                                        <div class="item">
                                            @foreach ($chunks as $chunk)
                                            <div class="box text-center">
                                                <a class="box-img" href="{{ route('category.show', $chunk->slug) }}" title="{{ $chunk->name }}">
                                                    <img class="img-responsive" src="{{ route('image', $chunk->image_156x100) }}" alt="{{ $chunk->name }}" />
                                                </a>
                                                <h4 class="box-title">
                                                    <a href="{{ route('category.show', $chunk->slug) }}" title="{{ $chunk->name }}">{{ $chunk->name }}</a>
                                                </h4>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li {{ check_active(route('category.show', $__categoryMenu->get(1)->slug)) }}>
                            <a href="route('category.show', $__categoryMenu->get(1)->slug)">{{ $__categoryMenu->get(1)->name }}</a>
                            @include('frontend.header._box-page', ['boxCategory' => $__categoryMenu->get(1)])
                        </li>
                        <li {{ check_active(route('category.show', $__categoryMenu->get(2)->slug)) }}>
                            <a href="{{ route('category.show', $__categoryMenu->get(2)->slug) }}">{{ $__categoryMenu->get(2)->name }}</a>
                            @include('frontend.header._box-page', ['boxCategory' => $__categoryMenu->get(2)])
                        </li>
                        <li {{ check_active(route('category.show', $__categoryMenu->get(3)->slug)) }}>
                            <a href="{{ route('category.show', $__categoryMenu->get(3)->slug) }}">{{ $__categoryMenu->get(3)->name }}</a>
                            @include('frontend.header._box-page', ['boxCategory' => $__categoryMenu->get(3)])
                        </li>
                        <li>
                            <a href="#">Liên hệ</a>
                            <div class="megamenu">
                                <div class="megamenu-inner">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4">
                                            <h4 class="heading color">Thông tin</h4>
                                            <!-- Contact form-->
                                                {{ Form::open([
                                                    'url' => route('home.contact'),
                                                    'role'  => 'form',
                                                    'files' => true,
                                                    'class' => 'contact-form',
                                                    'autocomplete'=>'off',
                                                ]) }}
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Họ và tên" name="name" />
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Email" name="email" />
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Số điện thoại" name="phone" />
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" type="text" placeholder="Nhập nội dung" name="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                                </div>
                                            {{ Form::close() }}
                                        </div>
                                        <div class="col-md-8 col-lg-8">
                                            <iframe frameborder="0" style="width:100%;height:374px;border:0;" src="{{ $configs['map'] }}" allowfullscreen="allowfullscreen"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
