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
                        <a href="{{ route('projects.configurations',['id' => $project->id]) }}"
                           data-toggle="tooltip"
                           title="Configurations">
                            <i class="fas fa-tools"></i>
                        </a>
                        <a href="{{ route('projects.deployments',['id' => $project->id]) }}"
                           data-toggle="tooltip"
                           title="Deployments">
                            <i class="fas fa-tasks"></i>
                        </a>
                        <a href="{{ route('projects.instances',['id' => $project->id]) }}"
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
    <style>
        .actions {
            display: flex;
            flex-direction: row;
            justify-content: end;
            align-items: center;
        }

        .actions a {
            color: #000000;
            margin: 5px 10px;
            font-size: 18px;
        }

        .actions a:hover {
            color: #09c;
        }
    </style>
@endsection
