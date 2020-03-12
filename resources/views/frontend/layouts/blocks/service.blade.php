<!-- Service -->
@if(isset($services) && $services)
<div class="container-fluid animated fadeInUp" style="color:#fff; background-color:#FF3D11; padding-top:100px; padding-bottom: 50px;">
    <div class="container-xl">
        <h4><strong><p class="text-center">  DỊCH VỤ </p></strong></h4>
        <div class="row">
            @foreach($services as $service)
            <div class="col-xm-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center animated fadeInUp delay-1s slow">
                <img src="{{ asset('storage/app/' . $service->image_link) }}" class="rounded-circle img-thumbnail" alt="" style="max-height: 250px; max-width: 250px;"><br><br>
                <h4><strong> {{ $service->title }} </strong></h4>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif