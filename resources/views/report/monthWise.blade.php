@extends("layouts.app")
@section('content')
    <div id="admin-content" class="py-8 bg-gray-100 min-h-screen">
        <div class="container mx-auto">
            <div class="flex justify-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 text-center">Monthwise Book Issue Report</h2>
            </div>
            <div class="flex justify-center mb-8">
                <form class="bg-white rounded shadow p-6 w-full max-w-md" action="{{ route('reports.month_wise_generate') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <input type="month" name="month" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ date('Y-m') }}">
                    </div>
                    <input type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded w-full cursor-pointer transition" name="search_month" value="Search">
                </form>
            </div>
            @if ($books)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded shadow text-gray-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b font-semibold">S.No</th>
                                <th class="px-4 py-2 border-b font-semibold">Student Name</th>
                                <th class="px-4 py-2 border-b font-semibold">Book Name</th>
                                <th class="px-4 py-2 border-b font-semibold">Phone</th>
                                <th class="px-4 py-2 border-b font-semibold">Email</th>
                                <th class="px-4 py-2 border-b font-semibold">Issue Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 border-b">{{ $book->id }}</td>
                                    <td class="px-4 py-2 border-b">{{ $book->student->name }}</td>
                                    <td class="px-4 py-2 border-b">{{ $book->book->name }}</td>
                                    <td class="px-4 py-2 border-b">{{ $book->student->phone }}</td>
                                    <td class="px-4 py-2 border-b">{{ $book->student->email }}</td>
                                    <td class="px-4 py-2 border-b">{{ $book->issue_date->format('d M, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">No Record Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
