
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>reset password code</title>

</head>
<body>

    <header>
        <div class="header" style="">

        </div>
    </header>

    <section>
        <div class="single">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="latest-building-item">
                            <div class="latest-building-item-thumb">
                                <a class="d-block" href="{{url('show-department/'.$item->id)}}">
                                    <img class="img-fluid"
                                        @if(!is_null($item->Images->first()))
                                            src="{{url(''.$item->Images->first()->image)}}" 
                                        @else 
                                            src="{{appPath().'/public/site/images/building-type-item-thumb.png'}}" 
                                        @endif>
                                </a>
                            </div>
                            <div class="latest-building-item-body">
                                <a class="latest-building-item-type" href="{{url('show-department/'.$item->id)}}">{{$item->title}}</a>
                                <h6 class="latest-building-item-body-price">{{$item->price}} ر.س</h6>
                                <ul class="latest-building-item-details list-unstyled">
                                    <li class="list-inline-item">{{$item->short_desc}}</li>
                                </ul>
                                <ul class="latest-building-item-info list-unstyled">
                                    <li class="list-inline-item">
                                        <i class="fas fa-user"></i>
                                        {{$item->User->name}}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{$item->City->title}}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="far fa-clock"></i>
                                        {{$item->created_at->diffForHumans()}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer" style="">
        </div>
    </footer>

</body>
</html>
