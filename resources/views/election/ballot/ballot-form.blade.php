@extends('layouts.app')

@section('content')
    <form action="/save-vote" method="POST">
        @csrf
        <div class="container">
            <h1>Ballot Form </h1>
            @foreach($positions as $position)
                <h3>{{$position->position_value}}</h3>
                <select class="form-select" aria-label="Default select example" name="voted_candidate[]">
                    <option selected='selected' value={{NULL}}>I choose to abstain</option>
                    @foreach($candidates_per_position[$position->position_value] as $candidate)
                        <option value={{$candidate->id}}>{{$candidate->getName()}}</option>
                    @endforeach
                </select>
            @endforeach
            <div>
                <button class="btn btn-primary btn-lg" onclick="">Save</button>
            </div>
        </div>

    </form>
@endsection
