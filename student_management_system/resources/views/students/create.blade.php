@extends('layouts.app')

@section('content')
    <h1>Add Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="courses" class="form-label">Courses</label>
            <select name="courses[]" id="courses" class="form-control" multiple>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-success me-2">Save</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>


    <script>
        $(document).ready(function() {
            $('#courses').select2({
                placeholder: "Select courses",
                allowClear: true
            });
        });
    </script>


@endsection
