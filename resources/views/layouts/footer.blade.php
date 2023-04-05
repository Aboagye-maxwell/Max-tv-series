<div class="" >
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer corrupt file report -->
        <div class="pt-3" style="background: url('/image/back4.png');">
            <!-- Corrupt file report row -->
            <div style="" class="container-fluid">
                <div class="" style="text-align: center;color: white;text-transform: uppercase;">
                    <h5>corrupt file report</h5>
                </div>
                <div style="text-align: center;color: #d7d6d6;">
                    <p>Please let us know if there is any file or link that has a problem</p>
                </div>
                {!! Form::open(['action' => 'App\Http\Controllers\SeriesController@store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
                <div class="row container-fluid">

                    <div class="col-sm pb-2">
                        {{Form::text('email','',['class' => 'form-control','placeholder' => 'Your Email'])}}
                    </div>
                    <div class="col-sm pb-2">
                        {{Form::text('name','',['class' => 'form-control','placeholder' => 'Series Name'])}}
                    </div>
                    <div class="col-sm pb-2">
                        {{Form::text('info','',['class' => 'form-control','placeholder' => 'File info e.g. "S01E03"'])}}
                    </div>
                    <div class="col-sm d-block pb-2">
                        <h6 class="pl-4" style="color: white;">Type of problem *</h6>
                        <div class="col d-flex">
                            <div class="pl-3">
                                {{Form::label('option','Link failed',['class'=>'','style'=>'color:white;'])}}
                                {{Form::radio('option','problem',['class' => 'form-control','value'=>''])}}
                            </div>
                            <div class="pl-3">
                                {{Form::label('option','Video',['class'=>'','style'=>'color:white;'])}}
                                {{Form::radio('option','problem',['class' => 'form-control','value'=>''])}}
                            </div>
                            <div class="pl-3">
                                {{Form::label('option','RAR',['class'=>'','style'=>'color:white;'])}}
                                {{Form::radio('option','problem',['class' => 'form-control','value'=>''])}}
                            </div>

                        </div>
                    </div>
                </div>
                {{--               file corrupt buttom--}}
                <div class="row pb-3">
                    <div class="col" style="display: flex;justify-content: center;">
                        {{Form::submit('Submit',['class' => 'btn btn-outline-light pl-5 pr-5'])}}
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- Footer notify of new address -->

        <div style="background: url('/image/back3.png');text-transform: uppercase;color: white;text-align: center;">
            {{--            heading of new address section--}}
            <div class="container-fluid">
                <h4 class="pt-4 pb-3" style="border-bottom: 2px dotted #b4b4b4; ">notify of new address</h4>
                <p style="text-transform: none;color: #b4b4b4;">Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.</p>

                {{--                    information about about our social media accounts,bookmarks and subscribe--}}
                <div class="row pt-4 pb-3">
                    {{--                        information about social network--}}
                    <div class="col" style="display: flex;justify-content: left;text-transform: none;text-align: left;">
                        <img src="/image/1.png" style="width: 80px;height: 80px;">
                        <div class="">
                            <h4>SOCIAL NETWORK</h4>
                            <p style="color: #b4b4b4">Best way is that you follow all our social networks at the same time</p>

                            <img src="/image/s-l.png">
                            <img src="/image/f-l.png">
                        </div>
                    </div>
                    {{--                        information about bookmarks--}}
                    <div class="col" style="display: flex;justify-content: left;text-transform: none;text-align: left;">
                        <img src="/image/2.png" style="width: 80px;height: 80px;">
                        <div class="">
                            <h4>BOOKMARKS</h4>
                            <p style="color: #b4b4b4">Bookmarks the address in front to your browsers in case of domain changes new address would
                                appear in that site automaticaly click on the icon</p>
                            <img src="/image/bookmark.svg" alt="">
                        </div>
                    </div>
                </div>
                {{--information about how you can subscribe to our website--}}
                <div class="row pt-3">
                    <div class="col" style="display: flex;justify-content: left;text-transform: none;text-align: left;">
                        <img src="/image/3.png" style="width: 80px;height: 80px;">
                        <div class="pl-2">
                            <h4>SUBSCRIBE TO OUR WEBSITE</h4>
                            <p style="color: #b4b4b4">Video provides a powerful way to help you prove your point.
                                When you click Online Video, you can paste in the embed code for the video you want to add.
                                You can also type a keyword to search online for the video that best fits your document.</p>
{{--                            <img src="/image/marker.svg" alt="" class="d-flex justify-content-center">--}}
                        </div>
                    </div>
                </div>


            </div>

        </div>

        {{--        takes in email to subscribe so that user can receive any news about series and the site--}}
        <div class="container-fluid" style="text-align: center;color: white;background-color: #41474c;border-bottom: 7px dashed #2f363b;border-top: 7px dashed #2f363b;">
            <h5 class="pt-4 pb-3">SUBSCRIBE TO HELP US LET YOU KNOW ABOUT OUR FUTURE CHANGE</h5>
            <form class="form-inline pb-4" action="" style="display: inline-flex;justify-content: center;">
                <input type="email" class="form-control pl-5 pr-5" id="email" placeholder="E-mail" name="email">
                <span class="pl-3"></span>
                <button type="submit" class="btn btn-outline-light pl-3 pr-3">SUBSCRIBE</button>
            </form>
        </div>

        {{--        mixed information in the footer--}}
        <div style="background-color: #2f363b;color: white; " class="container-fluid pt-4 pb-5">
            {{--            logo of websites--}}
            {{--            first section of row block--}}
            <div class="row">
                <div class="col-2 ml-5" style="display: block;">
                    <img src="/image/logo.svg" style="height: 50px;width: 50px;" class="">
                    <div  class="pt-1">
                        <h5>SERIES</h5>
                        <h5>BOX</h5>
                    </div>
                    <div style="color: #6a6f72" class="">
                        <h6>Today</h6>
                        <h6>Tv Series</h6>
                        <h6>DCMA</h6>
                        <h6>Contact</h6>
                        <h6>Follow us on</h6>
                    </div>
                </div>

                {{--            second section of row block--}}
                <div class="col-2" style="display: block;" class="pt-4">
                    <div>
                        <h1>16</h1>
                        <h5 style="color: #6a6f72;">THIS WEEK</h5>
                    </div>

                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright py-4" style="background-color: #4e555b;color: #828689;
        padding-left: 1%;font-size: 13px;">© <script>document.write(new Date().getFullYear());</script> Copyright:
            <a style="color: #a8a8aa;text-decoration: none;" href="/"> MaxOnline </a> Team HTML <span style="color: #a8a8aa;">Validation</span>

        </div>

    </footer>
    <!-- Footer -->
</div>
