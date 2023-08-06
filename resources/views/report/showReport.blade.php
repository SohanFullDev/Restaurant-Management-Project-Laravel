@extends('layouts.app')

@section('content')

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
          <li class="breadcrumb-item"> <a href="/report">Report </a></li>
          <li class="breadcrumb-item active" aria-current="page"> Result </li>
                    </ol>
                </nav>
        </div>
        </div>

        <div class="row">

                <div class="col-md-12">
                    @if($sales->count()>0)
                    <div class="alert alert-success" role="alert">
                        <p>The Total Amount of Sale from {{ $datepicker }} to {{ $datepicker2 }} is ${{ number_format($totalSale, 2) }}</p>

                        <p>Total Result: {{ $sales->total() }}</p>
                    </div>

                    @else
                        <div class="alert alert-danger" role="alert">
                            There is no Sale Report
                        </div>

                    @endif

                </div>


        </div>

    </div>

@endsection

