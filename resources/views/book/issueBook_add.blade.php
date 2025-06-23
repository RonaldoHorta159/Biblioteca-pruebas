@extends('layouts.app')
@section('content')
    <div id="admin-content" class="py-8 bg-gray-100 min-h-screen">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center mb-8">
                <div class="w-full md:w-1/4">
                    <h2 class="text-2xl font-semibold text-gray-800">Add Book Issue</h2>
                </div>
                <div class="w-full md:w-1/4 md:ml-auto text-right">
                    <a class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                        href="{{ route('book_issued') }}">All Issue List</a>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-lg bg-white rounded shadow p-8">
                    <form class="space-y-6" action="{{ route('book_issue.create') }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Student Name</label>
                            <select
                                class="block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                name="student_id" required>
                                <option value="">Select Name</option>
                                @foreach ($students as $student)
                                    <option value='{{ $student->id }}'>{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="mt-2 text-red-600 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Book Name</label>
                            <select
                                class="block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                name="book_id" required>
                                <option value="">Select Name</option>
                                @foreach ($books as $book)
                                    <option value='{{ $book->id }}'>{{ $book->name }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="mt-2 text-red-600 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <input type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold cursor-pointer"
                                value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
