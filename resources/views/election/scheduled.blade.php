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

                <h1>Election has been scheduled</h1>
                <h2>start date: &lt insert start date &gt</h2>
                <h2>end date: &lt insert end date &gt</h2>

                @if(Auth::user()->hasRole('non-admin'))
                    <a href="" class="btn btn-primary btn-sm">
                        Register as a Candidate
                    </a>
                @endif
                @if(Auth::user()->hasRole('admin'))
                <a href="{{ route('cancel-election') }}" class="btn btn-danger btn-sm">
                        Cancel Election
                    </a>
                @endif

            </div>
    </div>
    </div>
</div>

@endsection
