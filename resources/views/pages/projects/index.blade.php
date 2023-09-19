@extends('layouts.app')

@section('page-name')
    Projects
@endsection

@section('page-actions')
    <a href="{{ route('projects.add') }}">Add project</a>
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th style="width: 100px;"></th>
            <th>Project</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>
                    <img style="height:25px" src="{{ asset('images/' . $project->type . '.png') }}"
                         alt="{{ $project->type }}"
                         data-toggle="tooltip"
                    title="{{ $projectTypesNames[$project->type] }}">
                </td>
                <td>{{ $project->name }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('projects.show',['id' => $project->id]) }}"
                           data-toggle="tooltip"
                           title="Edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ route('projects.configurations',['project_id' => $project->id]) }}"
                           data-toggle="tooltip"
                           title="Configurations">
                            <i class="fas fa-tools"></i>
                        </a>
                        <a href="{{ route('projects.deployments',['project_id' => $project->id]) }}"
                           data-toggle="tooltip"
                           title="Deployments">
                            <i class="fas fa-tasks"></i>
                        </a>
                        <a href="{{ route('projects.instances',['project_id' => $project->id]) }}"
                           data-toggle="tooltip"
                           title="Instances">
                            <i class="far fa-building"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        @if(!count($projects))
            <tr>
                <td colspan="3" align="center">
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

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/table/actions.css') }}">
@endsection
