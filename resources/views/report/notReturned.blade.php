@extends("layouts.app")
@section('content')
    <div id="admin-content" class="py-8 bg-gray-100 min-h-screen">
        <div class="container mx-auto">
            <div class="flex justify-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 text-center">Not Returned Books</h2>
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
                                <th class="px-4 py-2 border-b font-semibold">Return Date</th>
                                <th class="px-4 py-2 border-b font-semibold">Over Days</th>
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
                                    <td class="px-4 py-2 border-b">{{ $book->return_date->format('d M, Y') }}</td>
                                    <td class="px-4 py-2 border-b">
                                        @php
                                            $date1 = date_create(date('Y-m-d'));
                                            $date2 = date_create($book->return_date->format('d-m-Y'));
                                            if($date1 > $date2){
                                                $diff = date_diff($date1,$date2);
                                                echo $days = $diff->format('%a days');
                                            }else{
                                                echo '0 days';
                                            }
                                        @endphp
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-4 text-center text-gray-500">No Record Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
