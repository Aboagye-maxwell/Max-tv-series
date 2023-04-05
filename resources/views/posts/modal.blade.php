<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Post</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Are you sure you want to remove post completely
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                {!! Form::open(['route' => ['posts.destroy',$post->id],'method' => 'POST','class'=>'']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Yes',['class'=>'btn btn-outline-danger pl-5 pr-5'])}}
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>


