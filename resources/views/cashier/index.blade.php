@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row" id="table-detail"></div>
    <div class="row justify-content-center py5">
         <div class="col-md-5">
            <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>
         </div>
         <div class="col-md-7"></div>

    </div>
</div>
<script>
   $(document).ready(function(){
    //make table-detail hidden by default
    $("#table-detail").hide();

    //show all tables when a client click on the button
     $("#btn-show-tables").click(function(){
    // alert("If you on view all table");
    if($("#table-detail").is(":hidden")){
        $.get("/cashier/getTable", function(data){
        $("#table-detail").html(data);
        $("#table-detail").slideDown('fast');
        $("#btn-show-tables").html('Hide Tables').removeClass('btn-primary').addClass('btn-danger');


        })

    }else{
        $("#table-detail").slideUp('fast');
        $("#btn-show-tables").html('View All Tables').removeClass('btn-danger').addClass('btn-primary');
    }



     });
   });

</script>

@endsection



