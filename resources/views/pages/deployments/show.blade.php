@extends('layouts.app')

@section('page-name')
    Deployment #{{ $deployment->id }} for {{ $deployment->branch }} on {{ $projectName }}
@endsection

@section('content')
    <div class="d-flex flex-column">

        <h2>Deployment #{{ $deployment->id }} for {{ $deployment->branch }}</h2>

        <h3>Status: {{ $deploymentStatusesNames[$deployment->status] }}</h3>

        <h4>Environment variables:</h4>

        <table>
            <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            @foreach($deployment->env_vars as $key => $value)
                <tr>
                    <td><b>{{ $key }}</b></td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4>Output:</h4>
        <div>
            <pre><code>{{ $deployment->output }}</code></pre>
        </div>
    </div>
@endsection
