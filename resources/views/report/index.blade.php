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
          <li class="breadcrumb-item active" aria-current="page"> Report </li>
                    </ol>
                </nav>
        </div>
        </div>

    </div>

@endsection

