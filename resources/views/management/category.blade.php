@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="/management/category" class="list-group-item list-group-item-action"> <i class="fas fa-align-justify"></i>Category</a>
                    <a href="" class="list-group-item list-group-item-action"> <i class="fas fa-hamburger"></i>Menu</a>
                    <a href="" class="list-group-item list-group-item-action"><i class="fas fa-chair"></i>Table</a>
                    <a href="" class="list-group-item list-group-item-action"> <i class="fas fa-users-cog"></i>User</a>
                </div>
            </div>
        <div class="col-md-8">
            <i class="fas fa-align-justify"></i>Category
            <a href="/management/category/create" class="btn btn-success btn-sm float-right"> <i class="fas fa-plus"></i>Create Category</a>
            <hr>
            @if (Session()->has('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{ Session()->get('status') }}
            </div>

            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
            {{ $categories->links() }}

        </div>
        </div>

    </div>

@endsection
