@extends('layouts.app')

@section('content')
    <form action="/save-registered-candidate" method="POST">
        @csrf
        <div class="container">
            Position:
            <select required class="form-select" aria-label="Default select example" name="position">
                @foreach($positions as $position)
                    <option value={{$position->id}}>{{$position->position_value}}</option>
                @endforeach
            </select>

            <div>
                <button class="btn btn-primary btn-lg">Save</button>
            </div>
        </div>
    </form>

@endsection
