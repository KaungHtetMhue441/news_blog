@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage category</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>

    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-0">
                       Edit category
                    </h4>


                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                       <div class="form-inline mb-3">
                           <input type="text" name="title" id="title"class="form-control form-control-lg mr-2" value="{{old('title',$category->title)}}">
                           <button type="submit" class="btn btn-lg btn-primary form-control">Update</button>
                       </div>
                    </form>
                    @error('title')
                <small class="text-danger">{{$message}}</small>
                    @enderror
                    @if(session('message'))
                        <small class="text-success">
                            {{session('message')}}
                        </small>
                        @endif
                    @include("Category.list")
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
