@extends('layouts.app')

@section('page-name')
    Deployment #{{ $deployment->id }} for {{ $deployment->branch }} on {{ $projectName }}
@endsection

@section('content')
    <div class="d-flex flex-column">

        <h2>Instance of {{ $projectName }} on branch {{ $deployment->branch }}</h2>

        <h3>Deployed by: <a
                href="{{ route('projects.deployments.show', ['project_id' => $instance->project_id, 'id' => $instance->last_deployment_id]) }}">
                #{{ $deployment->id }}
            </a>
        </h3>

        <p>Instance address: <a target="_blank" href="{{ $instance->domain }}">
                <i class="fas fa-external-link-alt"></i> {{ $instance->domain }}
            </a>
        </p>

        <p>Project dr: {{ $instance->project_dir }}</p>
        <p>Database name: <i>{{ $instance->db_name }}</i></p>

        <h4>Nginx file <small>{{ $instance->nginx_conf_file }}</small></h4>
        <div>
            <pre><code>{{ $nginxConfigContent }}</code></pre>
        </div>

        <h4>Access log file <small>{{ $instance->access_log_file }}</small></h4>
        <div>
            <pre><code>{{ $accessLogContent }}</code></pre>
        </div>

        <h4>Error log file <small>{{ $instance->error_log_file }}</small></h4>
        <div>
            <pre><code>{{ $errorLogContent }}</code></pre>
        </div>
    </div>
@endsection
