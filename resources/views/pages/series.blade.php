@extends('layouts.preset')

@section('content')




    <!-- Main Container For carousel -->
    <div class="row pb-3">
        <!-- First Container Of carousel Block -->
        <div class="col-sm-7 p-0" style="height: 100%;width: 100%;">



            <div id="demo" class="carousel slide" data-ride="carousel" >

                <!-- The slideshow -->
                <div class="carousel-inner">
                    @if(count($series) > 0)

                        <div class="carousel-item active" >
                            <a href="/ ">
                                <img src="image/hope.png"
                                     alt="image not found" style="height: 100%; width: 100%">
                            </a>
                        </div>

                        @foreach ($series as $serie)
                            @if($serie->recent=="true" )

                                <div class="carousel-item" >
                                    <a href="/series/{{$serie->id}}">
                                        <img src="image-c/{{$serie->cover_image}}"
                                             alt="image not found" style="height: 100%; width: 100%">
                                    </a>
                                </div>


                            @endif
                        @endforeach
                    @else
                        <div class="carousel-item active" >
                            <img src="image/nonewseries.png"
                                 alt="image not found" style="height: 100%; width: 100%">
                        </div>
                    @endif
                </div>


            </div>

        </div>

        <!-- Second Container Of row Block -->
        <div class="col-sm-2 p-0 most" style="width: 100%; height: 100%;">
            <div class="container py-0 my-0" >
                @if(count($series) > 0)

                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <h4 class="pt-3">About our site</h4>
                                <p>I am a graphic designer and web developer based in the eastern region of ghana,
                                i love to use technology to come up with solutions to problems. i am very hard working and work
                                well with others. I can work independently from start to finish of a particular web project. </p>
                                <a href="/" style="text-decoration: none;color: #080094;font-weight: bolder;"><h6>VISIT NOW  ></h6></a>
                            </div>
                            @foreach ($series as $serie)
                                @if($serie->recent=="true" )
                                    <div class="carousel-item">
                                        <h4 class="pt-3" style="text-transform: capitalize;">{{$serie->series_name}}</h4>
                                        <p>{{$serie->series_description_truancated}}</p>
                                        <a href="/series/{{$serie->id}}" style="text-decoration: none;color: #080094;font-weight: bolder;"><h6>DOWNLOAD HERE  ></h6></a>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                    </div>

                @endif
            </div>
        </div>

        <!-- Third Container Of carousel Block -->
        <div class="col-sm-3 p-0" style="width: 100%; height: 100%;">
            <div class="new-start">
                <div class="new-start-i">
                    <p class="">New Start</p>
                    <p style="position: relative;left: 55%" class="">October</p>
                </div>
                <div class="new-start-ii">
                    <p>Faceless</p>
                </div>
            </div>

            <div class="new-start-1">
                <div style="" class="new-start-i">
                    <p class="">New Start</p>
                    <p style="position: relative;left: 55%" class="">October</p>
                </div>
                <div style="" class="new-start-ii">
                    <p>Lucifer</p>
                </div>
            </div>

            <div class="new-start-2">
                <div style="" class="new-start-i">
                    <p class="">New Start</p>
                    <p style="position: relative;left: 55%" class="">October</p>
                </div>
                <div style="" class="new-start-ii">
                    <p>Loki</p>
                </div>
            </div>


        </div>



    </div>




{{--card to show the various movies/series available--}}
    @if(count($series) > 0)
        <div class="row">
            @foreach ($series as $serie)
                <div class="col-sm-2 p-3">
                    <div class="card" style="border-radius: 0px;">
                        <img class="card-img-top" src="image-s/{{$serie->cover_image}}" alt="Card image" style="width:100%;border-radius: 0px;">
                        <div class="card-body" style="background:url('image/film.png');
                height: 100%;background-repeat: no-repeat;background-position: fixed;opacity: 90%;">
                            <h4 class="card-title font-weight-bold pb-3"
                                style="color: #b4b4b4;text-transform: uppercase;text-align: center;font-size: 13px;">{{$serie->series_name}}</h4>
                            {{--                    <p class="card-text" style="color: #ffffff;">{{$serie->series_description_truancated}}</p>--}}
                            <div style="border: 1px solid #b4b4b4;">
                                <p class="pt-3" style="color: #b4b4b4;text-align: center;">DOWNLOAD</p>
                            </div>
                            <a href="/series/{{$serie->id}}" class="stretched-link" data-toggle="tooltip" title="{{$serie->series_name}}"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

{{--        pagnition of available movies--}}
        <div class="d-flex justify-content-center align-items-center">
            <div class="">
                {{$series->links("pagination::simple-bootstrap-5")}}
            </div>
        </div>


{{--        column for web name and tag--}}
        <div id="title" class="pt-5">
            <h1>MAX VISUAL GRAPHICS</h1>
            <h3>We are not just provider, we are tv series addicted !</h3>
        </div>


{{--        colummn for what we provide and image--}}
        <div class="cl pt-5 row">
            <div class="col container p-5">
                <h4>What We Provide?</h4>
                <p>In todaytvseries website we are trying our best to provide you tv series in high quality
                    and low size in the exact day of any series released with direct link that can help our users to download
                    their favorite tv show in just 3 click, our goal in todaytvseries is to give you a link with
                    high quality (480p | 720p) and low size (150mb | 200mb)for now all the the links
                    are 480p but in near future we are planing to provide you both quality.</p>
                <p>Note: All the link update within 24 hours from the tv show release time.</p>
            </div>
            <img class="col float-right p-0" src="image/monitor.jpg" alt="monitor image not found">
        </div>

    @else
        <div class="container d-flex justify-content-center pt-3">
            <h1>You have no series currently available.</h1>
        </div>

    @endif

@endsection
