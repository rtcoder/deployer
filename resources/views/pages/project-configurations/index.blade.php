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
                           data-bs-toggle="tooltip"
                           title="Edit">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <a href="{{ route('projects.configurations.run', ['project_id' => $projectId, 'id' => $configuration->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Run configuration">
                            <span class="material-symbols-outlined">play_arrow</span>
                        </a>
                        <a href="{{ $configuration->domain }}"
                           target="_blank"
                           data-bs-toggle="tooltip"
                           title="Open in new tab">
                            <span class="material-symbols-outlined">open_in_new</span>
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
