@extends('frontend.template')


@section('content')
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
                                        <img src="{{ asset("images/products/".$product->image) }}" alt="" />
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
