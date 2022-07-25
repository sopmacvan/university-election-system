@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <h1>No scheduled election</h1>
                @if(Auth::user()->hasRole('admin'))
                    <a href="" class="btn btn-primary btn-sm">
                        Create New
                    </a>
                @endif
            </div>
        </div>
    </div>
    </div>

@endsection
