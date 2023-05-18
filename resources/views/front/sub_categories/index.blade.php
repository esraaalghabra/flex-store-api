@extends('layouts.contents')

@section('content')
    <main id="main">
        {{--    Header    --}}
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{route('home')}}"><img src="{{asset('assets/products/products/logo.png')}}" alt=""></a></li>
                    <li><a href="{{route('mainCategory.index',$subCategory->mainCategory->id)}}">{{$subCategory->mainCategory->name}}</a></li>
                    <li><a href="#">{{$subCategory->name}}</a></li>

                </ol>
                <h2>{{$subCategory->name}}</h2>
            </div>
        </section>
        {{--    blog of subCategory    --}}
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry">
                            <div class="entry-img">
                                <img src="{{$subCategory->photo}}" alt="" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <a href="">{{$subCategory->name}}</a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center">{{$subCategory->products->count()}} <a href="#discounts"><i class="bi bi-bag"></i></a></li>
                                    <li class="d-flex align-items-center">{{$subCategory->vendors->count()}} <a href="#recent-blog-posts"> <i class="bi bi-shop"></i></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p> {{$subCategory->details}} </p>
                                <div class="read-more">
                                    <a href="#discounts">عرض المنتجات</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">بحث</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <h3 class="sidebar-title">المتاجر</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    @if(@isset($subCategory->vendors) && $subCategory->vendors->count()>0)
                                        @foreach($subCategory->vendors as $vendor )
                                    <li><a href="{{route('vendor.index',$vendor->id)}}">{{$vendor->name }}<span></span></a></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{--    List Products    --}}
        <section id="discounts" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>المنتجات والعروض</p>
                </header>
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @if(@isset($subCategory->products) && $subCategory->products->count()>0)
                        @foreach($subCategory->products as $product )
                            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <img src="{{$product->photo}} " style="width: 400px; height: 350px;" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>{{$product->name}}</h4>
                                        <p>{{$product->details}}</p>
                                        <div class="portfolio-links">
                                            <a href="{{$product->photo}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name}}"><i class="bi bi-plus"></i></a>
                                            <a href="{{route('product.index',$product->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                                        </div>
                                        <p>{{$product->vendor->name}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </section>

        {{--    List Vendors    --}}
        <section id="recent-blog-posts" class="recent-blog-posts team">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>المتاجر</p>
                </header>
                <div class="card mb-5 card-color">
                <div class="row gy-4">
                    @if(@isset($subCategory->vendors) && $subCategory->vendors->count()>0)
                        @foreach($subCategory->vendors as $vendor )
                            <div class="col-lg-3">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="{{$vendor->logo}}" alt="">
                                        <div class="social">
                                            <a href=""><i class="bi bi-plus"></i></a>
                                            <a href=""><i class="bi bi-usb"></i></a>
                                            <a href=""><i class="bi bi-bag-fill"></i></a>
                                            <a href=""><i class="bi bi-1-square-fill"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h2>{{$vendor->name}}</h2>
                                        <h4>{{$vendor->address}}</h4>
                                        <br>
                                        <a href="{{route('vendor.index',$vendor->id)}}" class="read-more"><span>قراءة المزيد</span> <i class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                </div>
            </div>
        </section>
    </main>
@endsection

