@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('deployer.Dashboard') }}</div>

                <div class="card-body">
                   <div class="tiles">
                       <a href="{{ route('projects') }}">
                           <div class="tile">
                               <div class="tile-icon">
                                   <i class="fas fa-cubes"></i>
                               </div>
                               <div class="tile-text">
                                   {{ $projects_count }} projects
                               </div>
                           </div>
                       </a>
                   </div>

                    <div class="last-deployments">
                        <h3>Last deployments</h3>
                       @include('layouts.tables.projects_deployments', ['deployments' => $last_deployments])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
