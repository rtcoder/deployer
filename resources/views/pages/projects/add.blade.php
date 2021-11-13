@extends('layouts.app')

@section('page-name')
    Add project
@endsection

@section('page-actions')
    <a href="{{ route('projects') }}">Cancel</a>
@endsection

@section('content')
    <form method="post">
        @csrf
        <div class="form-group">
            <label>
                Name
                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
            </label>
        </div>

        <div class="form-group">
            <label>
                Repository
                <input type="text" class="form-control" name="repo" required value="{{ old('repo') }}">
            </label>
        </div>

        <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type" required>
                @foreach($projectTypesNames as $type => $name)
                    <option value="{{ $type }}" @if(old('$type') === $type) selected @endif>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        @include('layouts.forms.save-buttons')
    </form>
@endsection
