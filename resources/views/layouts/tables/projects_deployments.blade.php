<table class="table">
    <thead>
    <tr>
        <th>Project</th>
        <th>Branch</th>
        <th>Preview</th>
    </tr>
    </thead>

    <tbody>
    @foreach($deployments as $deployment)
        <tr>
            <td>{{ $deployment->project_name }}</td>
            <td>{{ $deployment->branch }}</td>
            <td>
                <a href="{{ $deployment->url }}">
                    {{ $deployment->url }}
                </a>
            </td>
        </tr>
    @endforeach
    @if(!count($deployments))
        <tr>
            <td colspan="3" align="center">{{ __('No data') }}</td>
        </tr>
    @endif
    </tbody>
</table>
