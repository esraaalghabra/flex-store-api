@extends('layouts.contents')

@section('content')
    <main id="main">
        {{--    Header    --}}
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{route('home')}}"><img src="{{asset('assets/products/products/logo.png')}}" alt=""></a></li>
                    <li><a href="{{route('mainCategory.index',$vendor->mainCategory->id)}}">{{$vendor->mainCategory->name}}</a></li>
                    <li><a href="{{route('subCategory.index',$vendor->subCategory->id)}}">{{$vendor->subCategory->name}}</a></li>
                    <li><a href="#">{{$vendor->name}}</a></li>
                </ol>
                <h2>{{$vendor->name}}</h2>
            </div>
        </section>
        {{--    blog of vendor    --}}
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry">
                            <div class="entry-img">
                                <img src="{{$vendor->logo}}" alt="" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <a href="#">{{$vendor->name}}</a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"> <a href="#">{{$vendor->mobile}}<i class="bi bi-telephone"></i></a></li>
                                    <li class="d-flex align-items-center"> <a href=""><i class="ri-facebook-circle-fill"></i>facebook</a></li>
                                    <li class="d-flex align-items-center"> <a href="">{{$vendor->address}}<i class="bi-geo-alt"></i></a></li>
                                </ul>
                            </div>
                            <div>
                                <div>القسم الرئيسي :   <span>{{$vendor->mainCategory->name}}</span></div>

                                <div>القسم الفرعي :   <span>{{$vendor->subCategory->name}}</span></div>

                                <p>
                                    لا توجد أية تفاصيل حالياً
                                </p>
                            </div>

                            <div class="entry-content">

                                <div class="read-more">
                                    <a href="#Discounts">عرض المنتجات</a>
                                </div>
                            </div>
                        </article>

                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <h3 class="sidebar-title">أخرى</h3>
                            <div class="sidebar-item tags">
                                <ul>
                                    @if(@isset($vendor->subCategory->vendors) && $vendor->subCategory->vendors->count()>0)
                                        @foreach($vendor->subCategory->vendors as $ven )
                                            @if($ven->id!=$vendor->id)
                                                <li><a href="{{route('vendor.index',$ven->id)}}">{{$ven->name}}</a></li>
                                            @endif
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
        <section id="Discounts" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>المنتجات والعروض</p>
                </header>
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @if(@isset($vendor->products) && $vendor->products->count()>0)
                        @foreach($vendor->products as $product )
                            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <img src="{{$product->photo}}" style="width: 400px; height: 350px;" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>{{$product->name}}</h4>
                                        <p>{{$product->details}}</p>
                                        <div class="portfolio-links">
                                            <a href="{{$product->photo}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name}}"><i class="bi bi-plus"></i></a>
                                            <a href="{{route('product.index',$product->id)}}" title="More Details"><i class="bi bi-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </section>
    </main>
@endsection

