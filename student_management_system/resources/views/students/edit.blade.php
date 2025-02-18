@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <div class="mb-3">
            <label for="courses" class="form-label">Courses</label>
            <select name="courses[]" id="courses" class="form-control" multiple>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" @if($student->courses->contains($course->id)) selected @endif>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary me-2">Update</button>
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
