@extends('layouts.home')

@section('content')
    @include('front.includes.header')
    <main id="main">
        <section id="discounts" class="portfolio ">
            <div class="container" data-aos="fade-up">
                <div class="container" data-aos="fade-up">
                    <header class="section-header">
                        <p>المنتجات والعروض </p>
                        <h3></h3>
                    </header>
                    <div class="card mb-5 card-color" >
                        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                            @if(@isset($mainCategories) && $mainCategories->count()>0)
                                @foreach($mainCategories as $mainCategory )
                                @if($mainCategory->active==1
                                    && @isset($mainCategory->subCategories) && $mainCategory->subCategories->count()>0
                                    && @isset($mainCategory->vendors) && $mainCategory->vendors->count()>0
                                    && @isset($mainCategory->products) && $mainCategory->products->count()>0)

                                    @foreach($mainCategory->products as $index=> $product )
                                        @if(@isset($product->mainCategory) && @isset($product->subCategory) && @isset($product->vendor) && $product->active==1 && $product->amount>0)
                                        <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                                            <div class="portfolio-wrap">
                                                <img src="{{$product->photo}}" style="width: 300px; height: 200px;" class="img-fluid" alt="">
                                                <div class="portfolio-info">
                                                    <h4>{{$product->name}}</h4>
                                                    <p>{{$product->details}}</p>
                                                    <p>{{$product->price}}$</p>
                                                    <div class="portfolio-links">
                                                        <a href="{{$product->photo}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name}}"><i class="bi bi-plus"></i></a>
                                                        <a href="{{route('product.index',$product->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="mainDepartment" class="services portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>التصنيفات الرئيسية</p>
                    <h3></h3>
                </header>
                @if(@isset($mainCategories) && $mainCategories->count()>0)
                @foreach($mainCategories as $index=> $mainCategory )
                    @if($mainCategory->active==1
                    && @isset($mainCategory->subCategories) && $mainCategory->subCategories->count()>0
                    && @isset($mainCategory->vendors) && $mainCategory->vendors->count()>0
                    && @isset($mainCategory->products) && $mainCategory->products->count()>0)
                        <div class="card mb-5 card-color" >
                            <div class=" row gy-4 ">
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <div class="service-box @if($index==0) pink @elseif($index==1) blue @elseif($index==2) orange @elseif($index==3) red @elseif($index==4) pink @elseif($index==5) green @endif ">
                                        <div class="portfolio-details-slider swiper">
                                            <div class="swiper-wrapper align-items-center">
                                                <div class="swiper-slide">
                                                    <img src="{{$mainCategory->photo}}"  alt="">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{$mainCategory->photo_second}}" alt="">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{$mainCategory->photo_first}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <h3>{{$mainCategory->name}}</h3>
                                        <p> {{$mainCategory -> details}} </p>
                                        <a href="{{route('mainCategory.index',$mainCategory->id)}}" class="read-more"><span>قراءة المزيد </span> <i class="bi bi-arrow-left"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                                            @foreach($mainCategory->products as $index=> $product )
                                                @if(@isset($product->mainCategory) && @isset($product->subCategory) && @isset($product->vendor) && $product->active==1 && $product->amount>0)
                                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                                        <div class="portfolio-wrap">
                                                            <img src="{{$product->photo}}"  alt="">
                                                            <div class="portfolio-info">
                                                                <h4>{{$product->name}}</h4>
                                                                <p>{{$product->details}}</p>
                                                                <p>{{$product->price}}$</p>
                                                                <div class="portfolio-links">
                                                                    <a href="{{$product->photo}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name}}"><i class="bi bi-plus"></i></a>
                                                                    <a href="{{route('product.index',$product->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($index===5) @break @endif
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @endif
            </div>
        </section>
        <section id="subDepartment" class="services portfolio team recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>التصنيفات الفرعية</p>
                    <h3>Overview about Sub Departments</h3>
                </header>

                @if(@isset($mainCategories) && $mainCategories->count()>0)
                @foreach($mainCategories as $index=> $mainCategory )
                    @if($mainCategory->active==1
                    && @isset($mainCategory->subCategories) && $mainCategory->subCategories->count()>0
                    && @isset($mainCategory->vendors) && $mainCategory->vendors->count()>0
                    && @isset($mainCategory->products) && $mainCategory->products->count()>0)
                        @foreach($mainCategory->subCategories as $index=> $subCategory )
                        @if($subCategory->active==1 && @isset($subCategory->mainCategory)
                        && @isset($subCategory->vendors) && $subCategory->vendors->count()>0
                        && @isset($subCategory->products) && $subCategory->products->count()>0)
                            <div class="card mb-5 card-color">
                                <div class=" row gy-4 ">
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                        <div class="post-box">
                                            <div class="post-img">
                                                <div class="portfolio-details-slider swiper">
                                                    <div class="swiper-wrapper align-items-center">
                                                        <div class="swiper-slide">
                                                            <img src="{{$subCategory->photo}}" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{$subCategory->photo_second}}" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{$subCategory->photo_first}}" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="post-title"> {{$subCategory->name}}</h3>
                                            <h3 class="post-details"> {{$subCategory -> details}}</h3>
                                            <a href="{{route('subCategory.index',$subCategory->id)}}" class="readmore ">قراءة المزيد<i class="bi bi-arrow-left"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                                            @foreach($subCategory->products as $index=> $product )
                                                @if(@isset($product->mainCategory) && @isset($product->subCategory) && @isset($product->vendor) && $product->active==1 && $product->amount>0)
                                                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                                        <div class="portfolio-wrap">
                                                            <img src="{{$product->photo}}" style="width: 250px; height: 250px;" class="img-fluid" alt="">
                                                            <div class="portfolio-info">
                                                                <h4>{{$product->name}}</h4>
                                                                <p>{{$product->details}}</p>
                                                                <p>{{$product->price}}$</p>
                                                                <div class="portfolio-links">
                                                                    <a href="{{$product->photo}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name}}"><i class="bi bi-plus"></i></a>
                                                                    <a href="{{route('product.index',$product->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($index===5) @break @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($index===3) @break @endif
                        @endif
                        @endforeach
                    @endif
                @endforeach
                @endif
            </div>
        </section>
        <section id="vendors" class="recent-blog-posts team">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>المتاجر</p>
                    <h3></h3>
                </header>
                <div class="card mb-5 card-color">
                    <div class="row gy-4 ">
                        @if(@isset($mainCategories) && $mainCategories->count()>0)
                        @foreach($mainCategories as $mainCategory )
                            @if($mainCategory->active==1
                            && @isset($mainCategory->subCategories) && $mainCategory->subCategories->count()>0
                            && @isset($mainCategory->vendors) && $mainCategory->vendors->count()>0
                            && @isset($mainCategory->products) && $mainCategory->products->count()>0)
                                @foreach($mainCategory->vendors as $vendor )
                                    <div class="col-lg-3">
                                        <div class="member">
                                            <div class="member-img">
                                                <div class="portfolio-details-slider swiper">
                                                    <div class="swiper-wrapper align-items-center">
                                                        <div class="swiper-slide">
                                                            <img src="{{$vendor->photo}}" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{$vendor->photo_second}}" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <img src="{{$vendor->photo_first}}" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="social">
                                                    <a href=""><i class="bi bi-plus"></i></a>
                                                    <a href=""><i class="bi bi-usb"></i></a>
                                                    <a href=""><i class="bi bi-bag-fill"></i></a>
                                                    <a href=""><i class="bi bi-1-square-fill"></i></a>
                                                </div>
                                            </div>
                                            <div class="member-info">
                                                <h2>{{$vendor->name}}</h2>
                                                <h4> {{$vendor->details}}</h4>
                                                <h4><i class="bi bi-geo-alt"></i> {{$vendor->address}}</h4>
                                                <br>
                                                <a href="{{route('vendor.index',$vendor->id)}}" class="read-more"><span>قراءة المزيد</span> <i class="bi bi-arrow-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @if($index===7) @break @endif
                                @endforeach
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection


{{--
@if(@isset($product->mainCategory) && @isset($product->subCategory) && @isset($product->vendor) && $product->active==1 && $product->amount>0)
                                            @endif
--}}
