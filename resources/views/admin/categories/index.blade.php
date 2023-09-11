


@extends('adminlte::page')

@section('title', 'categories')

@section('content_header')
    
    <h2 class="text-center">Categories List</h2>
@stop

@section('content')
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        
        <a class="btn btn-danger mb-5" href="{{route('admin.categories.create')}}">Add new category</a>

        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bordered">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($categories)
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary custom-btn"><i class="fa fa-close"></i>Edit</a>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no categories yet</div>
                @endforelse
            @endisset
            
            


        </tbody>
        </table>

        </div>

        </div>
    </div>

    </div>

@stop