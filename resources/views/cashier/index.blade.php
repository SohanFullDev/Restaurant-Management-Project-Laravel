@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row" id="table-detail"></div>
    <div class="row justify-content-center py5">
         <div class="col-md-5">
            <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>

            <div id="selected-table"></div>

         </div>
         <div class="col-md-7">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($categories as $category)
                    <a href="" class="nav-item nav-link" data-id="{{ $category->id }}" data-toggle="tab">
                        {{ $category->name }}
                    </a>
                    @endforeach

                </div>

            </nav>
            <div id="list-menu" class="row mt-2">


            </div>

         </div>

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
     // load menus by category
     $(".nav-link").click(function(){
        $.get("/cashier/getMenuByCategory/"+$(this).data("id"),function(data){
            $("#list-menu").hide();
            $("#list-menu").html(data);
            $("#list-menu").fadeIn('fast');

        });

     });

     // detect button table onclick to show table data
     $("#table-detail").on("click",".btn-table",function(){
        var SELECTED_TABLE_ID = $(this).data("id");
        var SELECTED_TABLE_NAME = $(this).data("name");
        $("#selected-table").html('<br><h3>Table: '+SELECTED_TABLE_NAME+'</h3><hr>');

     });



   });

</script>

@endsection



