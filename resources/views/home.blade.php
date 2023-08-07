@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Main Functions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        @if(Auth::user()->checkAdmin())
                        <div class="col-sm-4">
                            <a href="/management">
                            <h4>Management</h4>
                            <img src="{{ asset('images/pic1.jpg') }}" width="50px" alt="">
                        </a>
                        </div>
                        @endif
                        <div class="col-sm-4">
                            <a href="/cashier">
                            <h4>Cashier</h4>
                            <img src="{{ asset('images/pic2.jpg') }}" width="50px" alt="">
                            </a>
                        </div>
                        @if(Auth::user()->checkAdmin())
                        <div class="col-sm-4">
                            <a href="/report">
                            <h4>Report</h4>
                            <img src="{{ asset('images/pic3.jpg') }}" width="50px" alt="">
                            </a>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
