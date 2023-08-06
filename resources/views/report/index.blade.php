@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <div class="container">
        <div class="row">
        <div class="col-md-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
          <li class="breadcrumb-item"> <a href="/home">Main Functions</a> </li>
          <li class="breadcrumb-item active" aria-current="page"> Report </li>
                    </ol>
                </nav>
        </div>
        </div>

        <div class="row">
            <form action="/report/show" method="GET">
                <div class="col-md-12">
                    <label for="">Choose Date For Report</label>
                    <div class="form-group">
                        <div class="input-group date" id="datepicker" data-target-input="nearest">
                             <input type="text" date="datepicker" class="form-control datetimepicker-input" data-target="#datepicker"/>
                             <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                             </div>
                         </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group date" id="datepicker2" data-target-input="nearest">
                             <input type="text" name="datepicker2" class="form-control datetimepicker-input" data-target="#datepicker2"/>
                             <div class="input-group-append" data-target="#datepicker2" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                             </div>
                         </div>
                     </div>

                     <input type="submit" class="btn btn-primary" value="Show Report">
                </div>
            </form>

        </div>

    </div>

    <script type="text/javascript">

    $(function(){
        $('#datepicker').datepicker();
        $('#datepicker2').datepicker();
    });
/*
    $(function () {
        $('#datepicker').datepicker({
            format : 'L'
        });
        $('#datepicker2').datepicker({
            format : 'L',
            useCurrent: false
        });
        $("#datepicker").on("change.datepicker", function (e) {
            $('#datepicker2').datepicker('minDate', e.date);
        });
        $("#datepicker2").on("change.datepicker", function (e) {
            $('#datepicker').datepicker('maxDate', e.date);
        });
    });*/

    </script>

@endsection

