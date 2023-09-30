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
                         data-bs-toggle="tooltip"
                    title="{{ $projectTypesNames[$project->type] }}">
                </td>
                <td>{{ $project->name }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('projects.show',['id' => $project->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Edit">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <a href="{{ route('projects.configurations',['project_id' => $project->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Configurations">
                            <span class="material-symbols-outlined">construction</span>
                        </a>
                        <a href="{{ route('projects.deployments',['project_id' => $project->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Deployments">
                            <span class="material-symbols-outlined">checklist</span>
                        </a>
                        <a href="{{ route('projects.instances',['project_id' => $project->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Instances">
                            <span class="material-symbols-outlined">domain</span>
                        </a>
                        <a href="{{ route('projects.delete',['id' => $project->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Delete">
                            <span class="material-symbols-outlined">delete</span>
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
