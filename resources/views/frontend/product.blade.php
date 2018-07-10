
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
                <form action="{{ url('customer/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ asset("images/products/".$product->image) }}" alt="" />
                            {{--<h3>ZOOM</h3>--}}
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->

                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $product->name }}</h2>
                            <p>{{ $product->description }}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
									<span>Rp. {{ number_format($product->price, 2) }}</span>
									<label>Jumlah:</label>
									<input name="quantity" class="quantity" id="quantity" type="text" value="1" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Beli
									</button>
								</span>
                            <p><b>Kategori:</b> {{ $product->category->name }}</p>
                            <a href=""><img src="" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                </div><!--/product-details-->
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
