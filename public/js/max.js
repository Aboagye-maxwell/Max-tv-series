var x = document.getElementById("search");
var y = document.getElementById("s-btn");
var z = document.getElementById("search-results");






$(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").alert("close");
    });
});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});


function display(){
    if (x.style.display === "none"){
        x.style.display = "inline-flex";
        // y.style.display = "none";
        x.focus();
    }else {
        x.style.display = "none";
    }
}

function hide(e) {
        let episodes = document.getElementById(e);
        if (episodes.style.visibility === 'visible'){
            episodes.style.visibility = 'collapse';
        }else {
            episodes.style.visibility = 'visible';
        }
}


// document.addEventListener('DOMContentLoaded',function () {
//     x.addEventListener('focus',function () {
//         y.style.display = "block";
//     })
// });

// $(document).ready(function(){
//     $("#myBtn").click(function(){
//         $("#myModal").modal();
//     });
// });
$(document).ready(function(){
    $("#myBtn").click(function(){
        $('.toast').toast('show');
    });
});


$(document).ready(function(){
    $(x).on('keyup',function(){
        var search = $(this).val();
        console.log(search);

        if(search.length>0){
            $.ajax({
                url:"series-search",
                data:{
                    search:search
                },
                dataType:'json',
                beforeSend:function(){

                },
                success:function(res,data){
                    console.log(res);
                    var tablerow = '';

                    $('#search-results').html('');

                    $.each(res,function(index,value){
                        tablerow = '<a id="box" href="/series/'+value.id+'"><li class="pl-4 pr-4">'+value.series_name+'</li></a>';
                    });

                    $('#search-results').html(tablerow);
                }
            });
        }else{
            $def ='';
            $('#search-results').html('');
            return false;
        }

    });
});
