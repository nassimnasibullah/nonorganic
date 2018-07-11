@extends('admin.template')

@section('content')

    <!-- Input Mask start -->
    <section class="inputmask" id="inputmask">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Kurir</h4>
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
                                    {!! Form::model($courier, ['route' => ['admin.courier.update', $courier->id], 'method' => 'PUT', 'files' => true]) !!}                                    <fieldset>
                                        <h5>Nama Kurir
                                            <small class="text-muted"></small>
                                        </h5>
                                        <div class="form-group">
                                            {{ Form::text('name', null, array('id' => 'name','class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
                                        </div>
                                        {{--<h5>Harga--}}
                                            {{--<small class="text-muted"></small>--}}
                                        {{--</h5>--}}
                                        {{--<div class="form-group">--}}
                                            {{--{{ Form::text('price', null, array('id' => 'price','class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}--}}
                                        {{--</div>--}}
                                    </fieldset>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" style="margin-bottom: 10px;" class="btn btn-primary">Submit <i class="ft-thumbs-up position-right"></i></button>
                                            {!! Form::close() !!}
											{!! Form::open(['route' => ['admin.courier.destroy', $courier->id], 'method' => 'DELETE']) !!}
                                            <button type="submit" class="btn btn-warning">Hapus <i class="ft-refresh-cw position-right"></i></button>
											{!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
