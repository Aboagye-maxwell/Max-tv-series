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
                            @if($serie->series->recent=="true" )
                                <div class="carousel-item" >
                                    <a href="/series/{{$serie->series->id}}">
                                        <img src="image-c/{{$serie->series->cover_image}}"
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
                                <p>Abi u know dada</p>
                                <a href="/" style="text-decoration: none;color: #080094;font-weight: bolder;"><h6>VISIT NOW  ></h6></a>
                            </div>
                            @foreach ($series as $serie)
                                @if($serie->series->recent=="true" )
                                    <div class="carousel-item">
                                        <h4 class="pt-3" style="text-transform: capitalize;">{{$serie->series->series_name}}</h4>
                                        <p>{{$serie->series->series_description_truancated}}</p>
                                        <a href="/series/{{$serie->series->id}}" style="text-decoration: none;color: #080094;font-weight: bolder;"><h6>DOWNLOAD HERE  ></h6></a>
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

            <div style="background-color: #f5f5f5;" class="new-start">
                <div style="color: #2d405e;" class="new-start-i">
                    <p class="">New Start</p>
                    <p style="position: relative;left: 55%" class="">October</p>
                </div>
                <div style="color: #2d405e;" class="new-start-ii">
                    <p>Lucifer</p>
                </div>
            </div>

            <div style="background-color: #f5f5f5;" class="new-start">
                <div style="color: #2d405e;" class="new-start-i">
                    <p class="">New Start</p>
                    <p style="position: relative;left: 55%" class="">October</p>
                </div>
                <div style="color: #2d405e;" class="new-start-ii">
                    <p>Loki</p>
                </div>
            </div>


        </div>



    </div>





    @if(count($series) > 0)


        <div class="row">
            @foreach ($series as $serie)
                <div class="col-sm-2 p-3">
                    <div class="card p-0 btn btn-outline-dark" style="border-radius: 0px;">
                        <img class="card-img-top" src="image-s/{{$serie->series->cover_image}}" alt="Card image" style="width:100%;border-radius: 0px;">
                        <div class="card-body" style="background:url('image/film.png');
                height: 100%;background-repeat: no-repeat;background-position: fixed;opacity: 90%;">
                            <h4 class="card-title font-weight-bold pb-3"
                                style="color: #b4b4b4;text-transform: uppercase;text-align: center;font-size: 13px;">{{$serie->series->series_name}}</h4>
                            {{--                    <p class="card-text" style="color: #ffffff;">{{$serie->series_description_truancated}}</p>--}}
                            <div style="border: 1px solid #b4b4b4;">
                                <p class="pt-3" style="color: #b4b4b4;text-align: center;">DOWNLOAD</p>
                            </div>
                            <a href="/series/{{$serie->series->id}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

{{--        <div class="d-flex justify-content-center">--}}
{{--            <div class="">--}}
{{--                {{$serie->series->links()}}--}}
{{--            </div>--}}
{{--        </div>--}}




    @else
        <div class="container d-flex justify-content-center pt-3">
            <h1>You have no series currently available.</h1>
        </div>

    @endif






@endsection
