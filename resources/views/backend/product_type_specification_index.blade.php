@extends('backend.template.app')
@section('map_link')
<div class="row col-md-12">
    <div class="map-link">
        <a href="{{ route('admin.dashboard') }}"> Dashboard <i class="fa fa-caret-right"></i> </a>  <a href="#"> Product type specification </a>
    </div>
</div>
@endsection
@section('container')
<div class="card pd-20 pd-sm-40">
    <div>
        <h6 class="card-body-title pull-left">Product type specification</h6>
        <div class="pull-right" title="Thêm mới"><a href="{{ route('admin.product_type_specification.create') }}" class="btn btn-outline-info btn-icon mg-r-5"><div><i class="fa fa fa-plus-circle"></i></div></a></div>
        <div style="row">
            <br>
            <hr style="border: 1px solid #D8DCE3;">
        </div>
    </div>

    @if (session('message_alert'))
        <div class="alert alert-{{session('type_alert')?? ''}}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-{{session('type_alert') == 'success' ? 'ios-checkmark' : (session('type_alert') == 'info' ? 'ios-information' : (session('type_alert') == 'warning' ? 'alert-circled' : (session('type_alert') == 'danger' ? 'ios-close' : '')))}} alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                <span>{!! session('message_alert') !!}</span>
            </div><!-- d-flex -->
        </div><!-- alert -->
    @endif
    <div class="table-wrapper">
        <table id="datatable" class="table table-striped responsive nowrap">
            <thead class="bg-info">
                <tr>
                    <th class="wd-5p text-center">#</th>
                    <th class="wd-20p text-center">Photo </th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-20p">Ingredient</th>
                    <th class="wd-10p text-right">Use periord (month) &nbsp;</th>
                    <th class="wd-10p text-right">Net weight (gr) &nbsp;</th>
                    <th class="wd-10p text-center">Show/Hide</th>
                    <th class="wd-10p"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($productTypeSpecifications ?? [] as  $productTypeSpecification)
                    <tr>
                        <td class="text-center align-middle"> {{$loop->iteration}} </td>
                        <td class="text-center align-middle"> <img class="img-thumbnail" src="{{ asset('storage/app/' . $productTypeSpecification->image_link) }}" alt="" style="max-height: 256px; max-width: 256px;"> </td>
                        <td class="align-middle">{{$productTypeSpecification->ProductType->name}}</td>
                        <td class="align-middle">{{$productTypeSpecification->ProductType->ingredient}}</td>
                        <td class="text-right align-middle">{{$productTypeSpecification->ProductType->use_periord}}</td>
                        <td class="text-right align-middle">{{ number_format($productTypeSpecification->net_weight, 0, ',', '.')}}</td>
                        <td class="text-center align-middle"><span href="#" class="btn btn-{{$productTypeSpecification->show ? 'info' : 'dark'}} btn-icon rounded-circle mg-r-5"><div><i class="fa fa fa-{{$productTypeSpecification->show ? 'eye' : 'eye-slash'}}"></i></div></span> </td>
                        <td class="text-center align-middle">
                            <form action="{{route('admin.product_type_specification.delete', ['id'=>$productTypeSpecification->id])}}" method="post">
                                <a href="{{ route('admin.product_type_specification.edit', ['id'=>$productTypeSpecification]) }}" class="btn btn-warning btn-icon mg-r-5" title="Edit"><div><i class="fa fa fa-edit"></i></div></a>
                                @csrf()
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete btn-icon mg-r-5" title="Delete"><div><i class="fa fa fa-trash"></i></div></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><!-- table-wrapper -->
</div><!-- card -->

@endsection