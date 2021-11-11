@extends('layouts.app')

@section('page-name')
    {{ __('deployer.Projects') }}
@endsection

@section('page-actions')
    <a href="{{ route('projects.add') }}">Add project</a>
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 100px;"></th>
            <th>Project</th>
            <th>Branch</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>
                    <img style="height:25px" src="{{ asset('images/' . $project->type . '.png') }}" alt="{{ $project->type }}">
                </td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->branch }}</td>
                <td>
                    <a href="{{ route('projects.show',['id' => $project->id]) }}">
                        Edit
                    </a>
                    <a href="{{ route('projects.deployment_configurations',['id' => $project->id]) }}">
                        Deployment configurations
                    </a>
                </td>
            </tr>
        @endforeach
        @if(!count($projects))
            <tr>
                <td colspan="4" align="center">
                    <div class="d-flex flex-column align-items-center">
                        No projects yet
                        <a href="{{ route('projects.add') }}">Add project</a>
                    </div>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
