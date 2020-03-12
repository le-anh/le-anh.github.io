<!-- Mission -->
@if(isset($missions) && $missions)
<div class="container-fluid animated fadeInUp" style="color:#fff; background-color:#08AEF8; padding-top:100px; padding-bottom: 50px;">
    <div class="container-xl">
        <div class="row">
            @foreach($missions as $mission)
            <div class="col-xm-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 text-center animated fadeInUp delay-1s slow">
                <img src="{{ asset('storage/app/' . $mission->image_link) }}" class="rounded-circle img-thumbnail" alt="" style="max-height: 150px; max-width: 150px;"><br><br>
                <h4><strong> {!! $mission->title !!} </strong></h4>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif