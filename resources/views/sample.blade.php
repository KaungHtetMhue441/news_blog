@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sample</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-0">
                        Sample page
                    </h4>

                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut commodi cupiditate delectus doloribus esse, harum mollitia, officia, pariatur repellendus repudiandae sint vel vitae. Delectus eligendi id laudantium magnam unde!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
