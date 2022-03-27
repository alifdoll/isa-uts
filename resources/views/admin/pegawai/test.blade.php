@extends('layouts.admin')

@section('css')
<link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

@endsection

@section('javascript')
<!-- Page level plugins -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection