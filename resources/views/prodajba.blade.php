@extends('layouts.app')

@section('content') 
<h1>Продажба</h1>
{{--dd($imoti)--}}
Total: {{--$imoti->total()--}}
    TOP:
    @foreach ($imoti['top'] as $imot)
      <p>This is imot ID:{{ $imot['id'] }} {{ $imot['title'] }} {{ $imot['status'] }} {{ $imot['agent_id'] }} </p>
    @endforeach
    

    All:
    @foreach ($imoti['imoti'] as $imot)
      <p>This is imot ID:{{ $imot['id'] }} {{ $imot['title'] }} {{ $imot['status'] }} {{ $imot['agent_id'] }} </p>
    @endforeach

    {!! $imoti['imoti']->links() !!}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
