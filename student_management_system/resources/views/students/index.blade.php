@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Student List</h1>

    <div class="d-flex justify-content-between mb-3">
        <!-- Search bar on the right -->
        <form method="GET" action="{{ route('students.index') }}" class="d-flex">
            <input type="text" name="search" placeholder="Search name or email" value="{{ request('search') }}" class="form-control me-2">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary ms-2">Clear</a>
        </form>

        <!-- Add Student button on the left -->
        <a href="{{ route('students.create') }}" class="btn btn-success">Add Student</a>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Courses</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    @foreach ($student->courses as $course)
                        <span class="badge bg-info">{{ $course->name }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
