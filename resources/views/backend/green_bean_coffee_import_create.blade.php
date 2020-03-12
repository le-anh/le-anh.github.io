@extends('backend.template.app')
@section('map_link')
<div class="row col-md-12">
    <div class="map-link">
        <a href="{{ route('admin.dashboard') }}"> Dashboard <i class="fa fa-caret-right"></i> </a>  <a href="{{ route('admin.green_bean_coffee_import.index') }}"> Green bean coffee import <i class="fa fa-caret-right"></i> </a> <a href=""> Edit </a>
    </div>
</div>
@endsection
@section('container')
<div class="card pd-20 pd-sm-40">
    <div>
        <h6 class="card-body-title">Green bean coffee import</h6>
        <div style="margin-top:-10px;">
            <hr style="border: 1px solid #D8DCE3;">
        </div>
    </div>

    @if (session('message_alert'))
        <div class="alert alert-{{session('type_alert')?? ''}} alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {!! session('message_alert') !!}
        </div>
    @endif

    <form role="form" action="{{ route('admin.green_bean_coffee_import.store') }}" method="post" enctype="multipart/form-data">
        @csrf()
        <div class="pd-20 pd-sm-40">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mg-t-20">
                    <div class="row">
                        <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Code: </label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee tx-16 lh-0 op-6"></i></span>
                                <input type="text" id="code" code="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code')}}" placeholder="Code" autofocus required>
                            </div>
                            @error('code') <div class="alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>
                </div><!-- row -->

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mg-t-20">
                    <div class="row">

                        <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Date: </label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee tx-16 lh-0 op-6"></i></span>
                                <input type="date" id="date_create" date_create="date_create" class="form-control @error('date_create') is-invalid @enderror" value="{{ old('date_create')}}" placeholder="Date" autofocus required>
                            </div>
                            @error('date_create') <div class="alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>
                    
                </div><!-- row -->

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mg-t-20">
                    <div class="row">
                        <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Sup: </label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee tx-16 lh-0 op-6"></i></span>
                                <input type="text" id="supplier_id" supplier_id="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" value="{{ old('supplier_id')}}" placeholder="Supplier" autofocus required>
                            </div>
                            @error('supplier_id') <div class="alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>
                </div><!-- row -->

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mg-t-20">
                    <div class="row">
                        <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Total: </label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee tx-16 lh-0 op-6"></i></span>
                                <input type="text" id="supplier_id" supplier_id="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" value="{{ old('supplier_id')}}" placeholder="Supplier" autofocus required>
                            </div>
                            @error('supplier_id') <div class="alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>
                </div><!-- row -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mg-t-20">
                    <div class="row">
                        <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Pay: </label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee tx-16 lh-0 op-6"></i></span>
                                <input type="text" id="supplier_id" supplier_id="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" value="{{ old('supplier_id')}}" placeholder="Supplier" autofocus required>
                            </div>
                            @error('supplier_id') <div class="alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>
                </div><!-- row -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mg-t-20">
                    <div class="row">
                        <label class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 form-control-label"> Due: </label>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-10 mg-t-10 mg-sm-t-0">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-coffee tx-16 lh-0 op-6"></i></span>
                                <input type="text" id="supplier_id" supplier_id="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" value="{{ old('supplier_id')}}" placeholder="Supplier" autofocus required>
                            </div>
                            @error('supplier_id') <div class="alert alert-danger"> {{$message}} </div> @enderror
                        </div>
                    </div>
                </div><!-- row -->


            </div>
            <hr>
            <div class="row">
              <div class="container-fluid">
                <div class="pull-left">
                  <h5>Details</h5>
                </div>
                <div class="pull-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGreenBeanCoffeeType"> <i class="fa fa-plus"></i> <strong>Add</strong> </button>
                </div>
              </div>
            </div>
            <br>

            <table class="table striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th> Green Bean Coffee </th>
                        <th> Unit </th>
                        <th class="text-right"> Price </th>
                        <th class="text-right"> Quantity </th>
                        <th class="text-right"> Total </th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">#</td>
                        <td> Green Bean Coffee </td>
                        <td> Unit </td>
                        <td class="text-right"> Price </td>
                        <td class="text-right"> Quantity </td>
                        <td class="text-right"> Total </td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-layout-footer mg-t-30 text-center">
            <button type="submit" class="btn btn-info mg-r-5"> <i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-secondary"> <i class="fa fa-retweet"></i> Cancel </button>
        </div><!-- form-layout-footer -->
    </form>
        
</div><!-- card -->

<!-- Modal green bean coffee -->

<div id="modalGreenBeanCoffeeType" class="modal fade">
  <div class="modal-dialog modal-lg" role="document" style="min-width: 500px;">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Green bean coffee</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <table id="datatable" class="table striped" width="100%">
          <thead>
              <tr>
                  <th class="text-center"> </th>
                  <th> Green bean coffee type </th>
                  <th> Description </th>
              </tr>
          </thead>
          <tbody>
            @foreach($greenBeanCoffeeTypes ?? [] as $greenBeanCoffeeType)
            <tr>
              <td class="text-center"> <input type="checkbox" name="greenbeancoffeetype" id="greenbeancoffeetype_{{ $greenBeanCoffeeType->id }}"> </td>
              <td> <label for="greenbeancoffeetype_{{ $greenBeanCoffeeType->id }}"> {{ $greenBeanCoffeeType->name }} </label> </td>
              <td> <label for="greenbeancoffeetype_{{ $greenBeanCoffeeType->id }}"> {{ $greenBeanCoffeeType->description }} </label> </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info pd-x-20"> <i class="fa fa-plus"></i> Add </button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"> <i class="fa fa-times"></i> Close </button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


@endsection