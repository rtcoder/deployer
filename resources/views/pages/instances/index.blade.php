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
                            <span class="material-symbols-outlined">visibility</span>
                        </a>
                        <a href="{{ $instance->domain }}"
                           data-bs-toggle="tooltip"
                           target="_blank"
                           title="Show instance">
                            <span class="material-symbols-outlined">open_in_new</span>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        @if(!count($instances))
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
