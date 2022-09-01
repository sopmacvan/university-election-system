@extends('layouts.app')

@section('content')
    <form action="/result" method="POST">
        @csrf
        <div class="container">
            <h1>Election Result </h1>
            @foreach($positions as $position)
                <h3>{{$position->position_value}}</h3>
                @foreach($candidates_per_position[$position->position_value] as $candidate)
                    {{"{$candidate->getName()} had {$candidate->countVotes()} votes"}}<br>
                @endforeach
            @endforeach
        </div>

    </form>
@endsection
