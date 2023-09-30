@extends('layouts.app')

@section('page-name')
    Deployments of {{ $projectName }}
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($deployments as $deployment)
            <tr>
                <td>#{{ $deployment->id }} for {{ $deployment->branch }}</td>
                <td>{{ $deploymentStatusesNames[$deployment->status] }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('projects.deployments.show', ['project_id' => $projectId, 'id' => $deployment->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Show deployment">
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        @if(!count($deployments))
            <tr>
                <td colspan="3" align="center">
                    <div class="d-flex flex-column align-items-center">
                        No deployments yet
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
