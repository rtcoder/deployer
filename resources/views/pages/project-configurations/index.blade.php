@extends('layouts.app')

@section('page-name')
    Deployment configurations for {{ $projectName }}
@endsection

@section('page-actions')
    <a href="{{ route('projects.configurations.add', ['project_id' => $projectId]) }}">Add configuration</a>
@endsection

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Branch</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($configurations as $configuration)
            <tr>
                <td>{{ $configuration->branch }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('projects.configurations.show', ['project_id' => $projectId, 'id' => $configuration->id]) }}"
                           data-toggle="tooltip"
                           title="Edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ route('projects.configurations.run', ['project_id' => $projectId, 'id' => $configuration->id]) }}"
                           data-toggle="tooltip"
                           title="Run configuration">
                            <i class="fas fa-play"></i>
                        </a>
                        <a href="{{ $configuration->domain }}"
                           target="_blank"
                           data-toggle="tooltip"
                           title="Open in new tab">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        @if(!count($configurations))
            <tr>
                <td colspan="2" align="center">
                    <div class="d-flex flex-column align-items-center">
                        No configuration yet
                        <a href="{{ route('projects.configurations.add', ['project_id' => $projectId]) }}">Add configuration</a>
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
