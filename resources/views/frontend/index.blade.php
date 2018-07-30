@extends('frontend.template')


@section('content')

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($sliders as $index => $slider)
                            <li data-target="#slider-carousel" data-slide-to="{{ ++$index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            <?php
                            $x = 0;
                            ?>
                        @foreach($sliders as $index => $slider)
                            <div class="item {{ $index == 0 ? 'active' : '' }}">
                                <div class="col-sm-6">
                                    <h1>{{ $slider->title }}</h1>
                                    <p>{{ $slider->description }}</p>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset("images/sliders/".$slider->image) }}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Kategori</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                @foreach($categories as $category)
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ url('catalogue/'.$category->id) }}">{{ $category->name }}</a></h4>
                                </div>
                                @endforeach
                            </div>

                        </div><!--/category-products-->


                        <div class="text-center"><!--shipping-->
                            <img src="{{ asset("images/home/jne.jpg") }}" alt="" />
                        </div><!--/shipping-->
						<div class="text-center"><!--shipping-->
                            <img style="margin-top:20px;" src="{{ asset("images/home/jnt.jpg") }}" alt="" />
                        </div><!--/shipping-->
						<div class="text-center"><!--shipping-->
                            <img style="margin-top:20px;" src="{{ asset("images/home/pos.jpg") }}" alt="" />
                        </div><!--/shipping-->
						<div class="text-center"><!--shipping-->
                            <img style="margin-top:20px;" src="{{ asset("images/home/wahana.jpg") }}" alt="" />
                        </div><!--/shipping-->


                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Produk</h2>
                        @foreach($products as $product)
                            <form action="{{ url('customer/cart') }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{ url('product/'.$product->id) }}"> <img src="{{ asset("images/products/".$product->image) }}" alt="" /></a>
                                        <h2>Rp. {{ number_format($product->price,2) }}</h2>
                                        <p>{{ $product->name }}</p>
                                        <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Beli</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                            </form>
                        @endforeach

                    </div><!--features_items-->



                </div>
            </div>
        </div>
    </section>

@endsection
