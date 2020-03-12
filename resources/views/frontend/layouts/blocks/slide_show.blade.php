<!-- Slide show -->
@if(isset($slideShows) && $slideShows)
<div class="container-fluid animated fadeInRight" style="color:#fff; background-color:#011E46;">
    <!-- <div class="container-xl"> -->
        <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="width:100%;">
                <ol class="carousel-indicators">
                    @foreach($slideShows as $slideShow)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $slideShow->id }}" class="{$loop->first ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($slideShows as $slideShow)
                    <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                        <img src="{{ URL::asset('storage/app/' . $slideShow->image_link) }}" class="d-block w-100 rounded mx-auto d-block" alt="..." style="max-height: 800px; align:center;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slideShow->title }}</h5>
                            <p>{{ $slideShow->text }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <!-- </div> -->
</div>
@endif