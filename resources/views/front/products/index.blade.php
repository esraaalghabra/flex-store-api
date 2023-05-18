@extends('layouts.contents')

@section('content')
  <main id="main">
      <section class="breadcrumbs">
          <div class="container">
              <ol>
                  <li><a href="{{route('home')}}"><img src="{{asset('assets/products/products/logo.png')}}" alt=""></a></li>
                  <li><a href="{{route('mainCategory.index',$product->mainCategory->id)}}">{{$product->mainCategory->name}}</a></li>
                  <li><a href="{{route('subCategory.index',$product->subCategory->id)}}">{{$product->subCategory->name}}</a></li>
                  <li><a href="{{route('vendor.index',$product->vendor->id)}}">{{$product->vendor->name}}</a></li>
                  <li><a href="#">{{$product->name}}</a></li>
              </ol>
              <h2>{{$product->name}}</h2>
          </div>
      </section>

      <section id="portfolio-details" class="portfolio-details blog">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <div class="swiper-slide horizontal-layout">
                                    <div class="row gy-4">
                                        <img src="{{$product->photo}}" style="width: 50%; height: 50%;" alt="">
                                        <img src="{{$product->photo_first}}" style="width: 50%; height: 50%;  " alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="row gy-4">
                                    <img src="{{$product->photo_first}}" style="width: 50%; height: 50%;  " alt="">
                                    <img src="{{$product->photo_second}}" style="width: 50%; height: 50%;  " alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="row gy-4">
                                    <img src="{{$product->photo_second}}" style="width: 50%; height: 50%;  " alt="">
                                    <img src="{{$product->photo}}" style="width: 50%; height: 50%;" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>{{$product->name}}</h3>
                            <ul>
                                <li><strong>السعر:  </strong>${{$product->price}}</li>
                                <li><strong>القياس: </strong> {{$product->size}}</li>
                                <li><strong>الكمية المتوفرة: </strong> {{$product->amount}}</li>
                                <li><strong><i class="bi bi-pass"></i> </strong> {{$product->details}}</li>
                                <li><strong><i class="bi bi-grid-1x2-fill"></i>  </strong>{{$product->subCategory->name}}</li>
                                <li><strong><i class="bi bi-shop-window"></i> </strong> {{$product->vendor->name}}</li>
                            </ul>
                            <div class="sidebar">
                                <h3 class="sidebar-title">شراء</h3>
                                <div class="sidebar-item search-form">
                                    <form action="">
                                        <input id="amount" name="amount" type="number">
                                        <button  type="submit"> طلب </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </section>
  </main>
@endsection
