@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Articles</a></li>
        <li class="breadcrumb-item active" aria-current="page">create</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route("article.store")}}" id="article_form" method="post">
                        @csrf
                        @method("post")
                    </form>

                </div>
            </div>

        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category" class="">Choose category</label>
                        <select name="category" form="article_form" class="custom-select  @error("category") is-invalid @enderror">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id==old('$category')?"selected":""}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error("category")
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control form-control-lg @error("title") is-invalid @enderror" form="article_form">
                        @error("title")
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea type="text" name="description" rows="7" id="description"class="form-control form-control-lg  @error("description") is-invalid @enderror" form="article_form">
                        </textarea>
                        @error("description")
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body p-3">
                    <div class="form-group">
                        <button type="submit" name="btn" class="btn btn-lg w-100 btn-primary" form="article_form">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
