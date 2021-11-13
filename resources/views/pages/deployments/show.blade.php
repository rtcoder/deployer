@extends('layouts.app')

@section('page-name')
    Deployment #{{ $deployment->id }} for {{ $deployment->branch }} on {{ $projectName }}
@endsection

@section('content')

@endsection
