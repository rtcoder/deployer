@extends('layouts.app')

@section('page-name')
    Dashboard
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endsection

@section('content')
    <div class="tiles">
        <a href="{{ route('projects') }}">
            <div class="tile">
                <div class="tile-icon">
                    <span class="material-symbols-outlined">deployed_code</span>
                </div>
                <div class="tile-text">
                    {{ $projects_count }} projects
                </div>
            </div>
        </a>
    </div>

    <div class="last-deployments">
        <h3>Last deployments</h3>
        @include('layouts.tables.projects_deployments', ['deployments' => $last_deployments])
    </div>
@endsection
