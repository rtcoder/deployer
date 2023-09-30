@extends('layouts.app')

@section('page-name')
    Instances of {{ $projectName }}
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
        @foreach($instances as $instance)
            <tr>
                <td>{{ $instance->branch }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('projects.instances.show', ['project_id' => $projectId, 'id' => $instance->id]) }}"
                           data-bs-toggle="tooltip"
                           title="Show deployment">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ $instance->domain }}"
                           data-bs-toggle="tooltip"
                           target="_blank"
                           title="Show instance">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        @if(!count($deployments))
            <tr>
                <td colspan="2" align="center">
                    <div class="d-flex flex-column align-items-center">
                        No instances yet
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
