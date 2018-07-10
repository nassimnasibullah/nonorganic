@extends('admin.template')

@section('content')

    <!-- Input Mask start -->
    <section class="inputmask" id="inputmask">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Produk</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    {!! Form::open(['route' => 'admin.product.store', 'data-parsley-validate' => '', 'class' => 'form-horizontal', 'files' => true, 'method' => 'POST  ']) !!}                                        <div class="form-group">
                                            <h5>Kategori Produk
                                                <small class="text-muted"></small>
                                            </h5>
                                            <select id="catgory_id" name="category_id" name="priority" class="form-control" data-toggle="tooltip"
                                                    data-trigger="hover" data-placement="top" data-title="Priority">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{ $category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <h5>Nama Produk
                                            <small class="text-muted"></small>
                                        </h5>
                                        <div class="form-group">
                                            {{ Form::text('name', null, array('id' => 'name','class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                        </div>
                                        <h5>Deskripsi Produk
                                            <small class="text-muted"></small>
                                        </h5>
                                        <div class="form-group">
                                            {{ Form::textarea('description', null, array('id' => 'description','class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                        </div>
                                        <h5>Harga Produk
                                            <small class="text-muted"></small>
                                        </h5>
                                        <div class="input-group" style="margin-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            {{ Form::text('price', null, array('id' => 'name','class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    <h5>Stok Produk
                                        <small class="text-muted"></small>
                                    </h5>
                                    <div class="input-group" style="margin-bottom: 10px;">
                                        {{ Form::text('quantity', null, array('id' => 'quantity','class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                                    </div>
                                        <h5>Gambar Produk
                                            <small class="text-muted"></small>
                                        </h5>
                                        <div class="form-group" style="margin-top: 10px;">
                                            {{ Form::file('image') }}
                                        </div>
                                        <div class="form-actions">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Submit <i class="ft-thumbs-up position-right"></i></button>
                                                {{--<button type="reset" onclick="document.getElementById('name').value = ''" class="btn btn-warning">Reset <i class="ft-refresh-cw position-right"></i></button>--}}
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
