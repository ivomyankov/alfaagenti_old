@extends('home/page')

@section('title', 'home')

@section('content_header')
    <h1>home</h1> 
@stop

@section('content')
    <!-- Main content -->
   
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
    
    <!-- /.content -->
@stop

@section('css')
   <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
   <!--  <script> console.log('Hi!'); </script> -->
   <script>
  
</script>
@stop
