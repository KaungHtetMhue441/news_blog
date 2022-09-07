@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Articles</a></li>
        <li class="breadcrumb-item active" aria-current="page">create</li>
    </x-bread-crumb>

    <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <div class="col-4 p-0">
                    <a href="{{route('article.index')}}" class="btn btn-lg btn-primary mb-3 pt-0 article-link">

                        <small>
                            <i class="feather-list"></i>
                            All articles
                        </small>
                    </a>
                </div>

                <div class="col-6 col-lg-4">

                    <div class="row justify-content-end align-items-center">
                        <form action="{{route("article.index")}}" id="form_search" method="get">

                            @method("get")
                        </form>
                        <input type="text"  form="form_search" name="search" id="search" placeholder="Search" class="rounded-pill search border-primary px-3" value="{{request()->search}}">
                        <div class="p-2"></div>
                        <button type="submit" class="btn btn-primary rounded-circle text-center" form="form_search"><i class="feather-search m-0 p-0"></i></button>
                    </div>
                </div>
            </div>
        <div class="col-12">
            <div class="card d-flex">
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <th>ID</th>
                        <th>Articles</th>
                        <th>user_id</th>
                        <th>category_id</th>
                        <th>Action</th>
                        <th>created_at</th>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>
                                    <span class="font-weight-bold">{{Str::words($article->title,5)}}</span>
                                    <br>
                                    <small class="text-black-50"> {{Str::words($article->description,10)}}</small>
                                </td>
                                <td>{{$article->user_id}}</td>
                                <td>{{$article->category_id}}</td>
                                <td>



                                    <a href="{{route('article.show',$article->id)}}"><small class="text-white mr-1 btn btn-sm btn-success">
                                            <i class="feather-list" style="font-size: 10px"></i>
                                            <span>show</span>
                                        </small>
                                    </a>
                                    <a href="{{route('article.edit',$article->id)}}"><small class="text-white mr-1 btn btn-sm btn-primary">
                                            <i class="feather-edit"></i>
                                            <span>edit</span>
                                        </small>
                                    </a>
                                    <form action="{{route("article.destroy",[$article->id,'page'=>request()->page])}}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" onclick="return comfirm('Are u sure to delete!?')">
                                            <i class="feather feather-delete"></i>
                                            <span>delete</span>
                                        </button>
                                    </form>

                                </td>
                                <td>{{$article->created_at->format("h:i A")}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    There are no record
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
{{--                        {{$articles->links()}}--}}
                        {{ $articles->appends(request()->all())->links() }}
                        <p class="font-weight-bold mb-0 h4"> Total - {{$articles->total()}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
