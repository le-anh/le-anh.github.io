<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TRUE COFFEE') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('bootstrap/4.4.1/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery/popper.1.16.0.min.js') }} "></script>
    <script src="{{ asset('bootstrap/4.4.1/bootstrap.min.js') }}"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        body{
            background-color:#F2F3F5;
        }
    </style>
    <script>
        let modalId = $('#image-gallery');

        $(document).ready(function () {
            loadGallery(true, 'a.thumbnail');

            //This function disables buttons when needed
            function disableButtons(counter_max, counter_current) {
                $('#show-previous-image, #show-next-image').show();
                if (counter_max === counter_current) {
                    $('#show-next-image').hide();
                } else if (counter_current === 1) {
                    $('#show-previous-image').hide();
                }
            }

            /**
            *
            * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
            * @param setClickAttr  Sets the attribute for the click handler.
            */

            function loadGallery(setIDs, setClickAttr) {
                let current_image,
                    selector,
                    counter = 0;

                $('#show-next-image, #show-previous-image').click(function () {
                    if ($(this).attr('id') === 'show-previous-image') {
                        current_image--;
                    } else {
                        current_image++;
                    }

                    selector = $('[data-image-id="' + current_image + '"]');
                    updateGallery(selector);
                });

                function updateGallery(selector) {
                    let $sel = selector;
                    current_image = $sel.data('image-id');
                    $('#image-gallery-title').text($sel.data('title'));
                    $('#image-gallery-detail').text($sel.data('detail'));
                    $('#image-gallery-image').attr('src', $sel.data('image'));
                    disableButtons(counter, $sel.data('image-id'));
                }

                if (setIDs == true) {
                    $('[data-image-id]').each(function () {
                        counter++;
                        $(this).attr('data-image-id', counter);
                    });
                }
                $(setClickAttr).on('click', function () {
                    updateGallery($(this));
                });
            }
        });

        // build key actions
        $(document).keydown(function (e) {
            let modalId = $('#image-gallery');
            switch (e.which) {
                case 37: // left
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                    $('#show-previous-image').click();
                    }
                    break;

                case 39: // right
                    if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                    $('#show-next-image').click();
                    }
                    break;

                default:
                    return; // exit this handler for other keys
            }
            e.preventDefault(); // prevent the default action (scroll / move caret)
        });
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-light" style="color:#fff !important; background-color:#FF3D11 !important;">
            <div class="container-xl">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('storage/app/uploads/missions/mission4.jpg') }}" width="48" height="48" class="d-inline-block rounded-circle img-thumbnail" alt="">
                    <strong> TRUE COFFEE </strong>
                </a>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-store-alt"></i> SẢN PHẨM </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-newspaper"></i> BÀI VIẾT </a>
                        </li> -->
                        <li class="nav-item">
                            <strong><a class="nav-link" href="{{ route('contact.index') }}"><i class="fa fa-address-book"></i> LIÊN HỆ </a></strong>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Nội dung tìm kiếm" aria-label="Nội dung tìm kiếm">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form> -->
                </div>
            </div>
        </nav>

        <main>
            @yield('content')

            <!-- Footer -->
            @include('frontend.layouts.blocks.footer')
        </main>

        <!-- Modal alert -->
        <div class="modal fade" id="modal_alert" tabindex="-1" role="dialog" aria-labelledby="modal_alertTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">TRUE COFFEE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="fa fa-window-close"> </i> </span>
                    </button>
                </div>
                    @if (session('message_alert'))
                    <div class="modal-body alert alert-{{session('type_alert')?? ''}}" style="margin-bottom: -5px;">
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="fa fa-{{session('type_alert') == 'success' ? 'check-circle' : (session('type_alert') == 'info' ? 'info-circle' : (session('type_alert') == 'warning' ? 'exclamation-triangle' : (session('type_alert') == 'danger' ? 'times-circle' : '')))}} alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                        <span> &nbsp; {!! session('message_alert') !!} </span>
                    </div><!-- d-flex -->
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Đóng </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <script>
        function AlertMessage() {
            var checkAlert = "{{ session('message_alert') ? TRUE : FALSE }}";
            if(checkAlert)
            $('#modal_alert').modal('show');
        }
        AlertMessage();
    </script>
    @yield('javascript')
</body>
</html>
