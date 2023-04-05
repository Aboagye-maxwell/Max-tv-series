@extends('layouts.more')

@section('content')
{{--    create one row--}}
    <div class="row">
{{--    first column of row--}}
        <div class="col-sm-9 p-0" style="height: 100%;width: 100%;">

            <div style="position: absolute;top: 10px;
            display: flex;"
                 class="pl-3">
               <a style="width: fit-content;height: fit-content;
               background-color: rgba(45,64,93,0.74);border-radius: 10%;color: #ffffff;
                text-align: justify;margin: 5px; text-decoration: none;" href="/" class="pl-1 pr-1"><div>TODAY</div></a>

                <a style="width: fit-content;height: fit-content;
               background-color: rgba(45,64,93,0.74);border-radius: 10%;color: #ffffff;
                text-align: justify;margin: 5px; text-decoration: none;" href="/" class="pl-1 pr-1"><div>TV SERIES</div></a>

                <a style="width: fit-content;height: fit-content;
                    background-color: rgba(45,64,93,0.33);border-radius: 10%;color: #ffffff;
                    text-align: justify;margin: 5px; text-decoration: none;
                    text-transform: uppercase;" href="#" class="pl-3 pr-3">
                    <span>
                        {{$series->series_name}}
                    </span>
                </a>
            </div>

            @if($series->count()>0)

                    <div class="row p-0 m-0">
                        <div class="col p-0 m-0">
                            <div class="container-fluid p-0 m-0">
                                <img class="" src="/image-c/{{$series->cover_image}}" alt="Card image"
                                     style="width:100%;">

                                <div class="" id="time">
                                    <h3 class="pt-5">{{$series->created_at->isoFormat('LL')}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

            @endif




{{--            --}}
                <div class="pl-4 pt-4 pr-4">

                    <div style="border-left: 7px solid #3F6FB6FF;border-bottom: 1px solid #e4e4e4;height: 60px">
                        <h1 style="color: #324768;text-transform: capitalize;font-weight: bolder;font-size: 40px;"
                            class="pl-3 pt-2">{{$series->series_name}}</h1>
                    </div>

                    <p id="d-truancated" style="color: #325076;" class="pt-1">{{$series->series_description_truancated}}</p>

                    <p style="color: #325076" class="pt-2">{{$series->series_description}}</p>

                    <div class="pt-3">
                        <p style="color: #324768;text-align: center; font-size: 15px;font-weight: bold;">For downloading the last episode of {{$series->series_name}} please click below and for download the
                            rest of the episode please scroll down to find rest season and episodes</p>
                    </div>

                    {{--              heading for the latest episode download  --}}
                    <div class="" style="height: 50px; width: 100%;color: #1f6fb2;background-color: #324768;">
                        <p style="text-align: center;color: #ffffff;text-transform: capitalize;font-size: large;" class="pt-3">direct download
                            @if(count($seasons) >0 && count($episodes)>0)
                                S{{$seasons_l->season_name}}E{{$episodes_l->episode_name}} {{$series->series_name}} tv series</p>
                        @endif
                    </div>

                    {{--                showing the download button for the latest episode--}}
                    <div class="d-flex justify-content-center pt-3">
                        @if(count($episodes)>0)
                            <a href="/download/{{$episodes_l->movie}}">
                                <button type="button" class="btn btn-outline-primary pl-5 pr-5" >Download</button>
                            </a>
                        @endif
                    </div>


                    <div class="row pt-3">
                       <div class="col-sm">
                           <div class="table-responsive">
                               <table class="table table-bordered" style="">
                                   <thead>
                                   <tr class="" style="text-transform: capitalize;text-align: center;color: #ffffff;background-color: #324768;">
                                       <th>genres</th>
                                       <th>language</th>
                                       <th>resolution</th>
                                       <th>file size</th>
                                       <th>imdb rating</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr id="trel" style="text-align: center;background-color: #ebecff;color: #2d405d;">
                                       <td>{{$series->genres}}</td>
                                       <td style="text-transform: capitalize;">{{$series->language}}</td>
                                       <td>{{$series->resolution}}</td>
                                       <td>{{$series->estimated_episode_size}}</td>
                                       <td>{{$series->imdb_rating}}</td>
                                   </tr>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                    </div>


                    <div style="background-color:#324768;" class="container-fluid">
                        <h3 class="pt-2" style="color: #ffffff;text-transform: capitalize;text-align: center;">next episode!</h3>
                        <p class="pb-2" style="text-transform: uppercase;color: #ffffff;
                text-align: center;font-weight: lighter;font-size: 30px;">4days  21hours  25min  13sec</p>
                    </div>




                @if(count($seasons)>0)
                        @foreach($seasons as $season)

                            {{--section for the downloads interface--}}
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="ho" onclick="hide({{$season->id}})">
                                    <tr style="text-transform: capitalize;color: #ffffff;background-color:#3e6eb5;">
                                        <th>download Season {{$season->season_name}}</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    @if(count($episodes)>0)
                                        <tbody style="background-color: #bdbdbd;visibility: collapse;" id="{{$season->id}}">
                                        @foreach($episodes as $episode)
                                            @if($season->id==$episode->seasons_id)
                                            <tr style="background-color: #ebecff;height: 20px;align-content: center;text-align: center;color: #3e6eb7;">
                                                <td style="font-weight: bold;text-align:left; ">S{{$season->season_name}}E{{$episode->episode_name}}</td>
                                                <td style="font-weight: bold;"><h5>{{$episode->file_size}}</h5></td>
                                                <td class="float-right">
                                                    <a class="btn btn-outline-primary pl-5 pr-5" href="/download/{{$episode->movie}}">Download 480</a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    @endif
                                </table>
                            </div>


                            {{--                        <div class="row">--}}
{{--                            <div class="col-sm">--}}
{{--                                <div class="table-responsive pt-3" style="width: 100%;">--}}
{{--                                    <table class="table table-striped">--}}
{{--                                        <thead class="ho" onclick="hide({{$season->id}})">--}}
{{--                                        <tr class=""--}}
{{--                                            style="text-transform: capitalize;color: #ffffff;--}}
{{--                                        background-color:#3e6eb5;width: 100%;" >--}}
{{--                                            <th>download Season {{$season->season_name}}</th>--}}
{{--                                            <th></th>--}}
{{--                                            <th></th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        @if(count($episodes)>0)--}}
{{--                                            <tbody class="" style="background-color: #bdbdbd;visibility: collapse;" id="{{$season->id}}">--}}
{{--                                            @foreach($episodes as $episode)--}}
{{--                                                @if($season->id==$episode->seasons_id)--}}
{{--                                                    <tr class="" style="background-color: #ebecff;height: 20px;align-content: center;--}}
{{--                                                        text-align: center;color: #3e6eb7;">--}}
{{--                                                        <td class="pt-4" style="font-weight: bold;">S{{$season->season_name}}E{{$episode->episode_name}}</td>--}}
{{--                                                        <td style="font-weight: bold;" class="pt-4"><h5>{{$episode->file_size}}</h5></td>--}}
{{--                                                        <td class="float-right">--}}
{{--                                                            <a class="btn btn-outline-primary pl-5 pr-5" href="/download/{{$episode->movie}}">--}}
{{--                                                                Download 480--}}
{{--                                                            </a>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                            @endif--}}
                        @endforeach

                        {{--info and images of series sponcers--}}
                        <div style="background-color:#324768; width: 100%;height: fit-content;">
                            <p class="m-1 p-1" style="color: white">
                                Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.
                            </p>
                            <div style="display: flex;justify-content: center;padding-bottom: 2%;">
                                <img src="{{url('/'). '/image/logo.svg'}}" style="height: 100px;width: 100px;" class="pr-4">
                                <img src="{{url('/'). '/image/logo.svg'}}" style="height: 100px;width: 100px;" class="pl-4">
                            </div>
                        </div>

                        {{--info about file extension--}}
                        <div class="row pt-3">
                            <div class="col-9">
                                <p>We try our very best to put the highest quality with low size in mkv file extension<br>
                                    Note: we do not provide subtitle for this series for downloading the subtitle please go to this link
                                </p>
                            </div>
                            <div class="col-3" style="display: flex;justify-content: right;height: 80px;width: 80px;">
                                <img src="/image/logo.png" >
                            </div>
                        </div>

                        {{--                ScreenCaps--}}
                        <div class="pt-3">
                            {{--                    Headind--}}
                            <div style="background-color:#324768; width: 100%;height: fit-content;text-align: center;color: white;">
                                <h4 class="p-1">Screencaps</h4>
                            </div>
                            {{--                    Screecap images--}}
                            <div class="row">
                                <div class="col">
                                    <img src="/image/hope.png" style="width: 100px;height: 100px;border-radius: 50%">
                                </div>
                                <div class="col">
                                    <img src="/image/hope.png" style="width: 100px;height: 100px;border-radius: 50%">
                                </div>
                                <div class="col">
                                    <img src="/image/hope.png" style="width: 100px;height: 100px;border-radius: 50%">
                                </div>
                                <div class="col">
                                    <img src="/image/hope.png" style="width: 100px;height: 100px;border-radius: 50%">
                                </div>
                                <div class="col">
                                    <img src="/image/hope.png" style="width: 100px;height: 100px;border-radius: 50%">
                                </div>
                                <div class="col">
                                    <img src="/image/hope.png" style="width: 100px;height: 100px;border-radius: 50%">
                                </div>
                            </div>
                            <div class="pt-2 pb-2" style="border-bottom: 2px dotted #3f6fb6;"></div>
                            <br>
                            <p style="border-left: 5px solid #3F6FB6FF;" class="pl-2">{{$series->genres}}</p>
                        </div>


                    @endif


                </div>

        </div>

{{--second colom of row--}}
        <div class="col-sm-3" style="background: #2d405d;">

                        <div class="row">
                            <div style="height: 100px;background-color: #25539a;width: 100%;" class="col-sm-12 p-0">
                                <h4 style="text-align: center;color: #ffffff;text-transform: uppercase;" class="pt-5">{{$once->series_name}}</h4>
                            </div>
                        </div>

                        <div class="row">

                                <div class="col-sm-12 p-0" style="background: url('/storage/images/hope.png');width:100%; height: 100%;">
                                    <a href="/series/{{$once->id}}">
                                        <img class="" src="/image-c/{{$once->cover_image}}" alt="Card image"
                                             style="width:100%; height: 100%;">
                                    </a>
                                </div>

                        </div>

{{--heading of users beloved --}}
            <div class="row">
                <div style="display: flex;background-color: #2d405d;justify-content: center;" class="col pt-4">
                    <h5 style="text-transform: uppercase; color: #ffffff;" class="pr-5">
                        users beloved
                    </h5>
                    <h6 style="text-transform: uppercase;color: #ffffff;border-left: 5px solid #ffffff;padding-left: 2%;" class="pt-1">
                        series
                    </h6>
                </div>
            </div>

{{--            image cards of series that users love/users beloved --}}
            @if(count($users_loved)>0)
                <div class="row pt-3 pr-3 pl-3 pb-2" style="background-color: #2d405d;">

                        @foreach($users_loved as $user_loved)
                        <div class="col-sm-6 pt-4" style="height: 100%;width: 100%;">
                            <a href="/series/{{$user_loved->id}}">
                                <img class="" src="/image-s/{{$user_loved->cover_image_sized}}" alt="Card image"
                                     style="width:100%; height: 100%;">
                            </a>
                        </div>
                        @endforeach
                </div>
            @endif


{{--            heading of website being responsive on all platforms--}}
            <div class="row">
                <div style="display: flex;background-color: #2d405d;justify-content: center;" class="col pt-4">
                    <h5 style="text-transform: uppercase; color: #ffffff;" class="pr-5">
                        high quality
                    </h5>
                    <h6 style="text-transform: uppercase;color: #ffffff;border-left: 5px solid #ffffff;padding-left: 2%;" class="pt-1">
                        low size
                    </h6>
                </div>
            </div>

{{--            image of website being responsive on all platforms --}}
            <div class="pb-3 pt-3">
                <img src="/image/all-device.png" alt="not found">
            </div>

            {{--            heading of series filters available--}}
            <div class="row">
                <div style="display: flex;background-color: #2d405d;justify-content: center;" class="col pt-4">
                    <h5 style="text-transform: uppercase; color: #ffffff;" class="pr-5">
                        filter
                    </h5>
                    <h6 style="text-transform: uppercase;color: #ffffff;border-left: 5px solid #ffffff;padding-left: 2%;" class="pt-1">
                        series
                    </h6>
                </div>
            </div>

{{--            simple image cards of filters--}}
    <div class="row container pt-2">
        <div class="col filter mr-3">
            <a href="#" style="text-decoration: none;color: white">
                action
            </a>
        </div>
        <div class="col filter ">
            <a href="#" style="text-decoration: none;color: white">
                adventure
            </a>
        </div>
    </div>

        </div>

    </div>

@endsection
