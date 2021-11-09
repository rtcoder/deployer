@extends('layouts.app')

@section('page-name')
    {{ __('deployer.Projects') }}
@endsection

@section('page-actions')
    <a href="{{ route('projects.add') }}">Add project</a>
@endsection

@section('content')
    <div class="tiles">
        @foreach($projects as $project)
            <a href="{{ route('projects.show',['id' => $project->id]) }}">
                <div class="tile">
                    <div class="tile-icon">
                        <img src="{{ asset('images/' . $project->type . '.png') }}" alt="{{ $project->type }}">
                    </div>
                    <div class="tile-text">
                        {{ $project->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @if(!count($projects))
        <div class="d-flex flex-column align-items-center">
            No projects yet
            <a href="{{ route('projects.add') }}">Add project</a>
        </div>
    @endif
@endsection
