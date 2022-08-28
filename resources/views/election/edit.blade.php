@extends('layouts.app')

@section('content')
    <form action="/save-edited-election" method="POST">
        @csrf
        <div class="container">
            Start Date:
            <div><input required type="date" name="start_date"></div>
            End Date:
            <div><input required type="date" name="end_date"></div>

            <div>
                <button class="btn btn-primary btn-lg">Save</button>
            </div>
        </div>
    </form>

@endsection
