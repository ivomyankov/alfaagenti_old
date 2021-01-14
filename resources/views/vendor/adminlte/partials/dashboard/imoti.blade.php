@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Имоти</h1> 
@stop

@section('content')
    <!-- Main content -->
    Total: {{--$imoti->total()--}}
    
    @foreach ($imoti as $imot)
      <p>This is imot ID:{{ $imot['id'] }} {{ $imot['title'] }} {{ $imot['status'] }} {{ $imot['agent_id'] }} </p>
    @endforeach

    {!! $imoti->links() !!}
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
