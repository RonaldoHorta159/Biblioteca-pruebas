@extends("layouts.app")
@section('content')
    <div id="admin-content" class="py-8 bg-gray-100 min-h-screen">
        <div class="container mx-auto">
            <div class="flex justify-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Reports</h2>
            </div>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="w-full sm:w-72">
                    <div class="bg-white rounded shadow p-6 text-center hover:shadow-lg transition">
                        <a href="{{ route('reports.date_wise') }}" class="block">
                            <h5 class="text-xl font-semibold text-blue-700 mb-0">Date Wise Report</h5>
                        </a>
                    </div>
                </div>
                <div class="w-full sm:w-72">
                    <div class="bg-white rounded shadow p-6 text-center hover:shadow-lg transition">
                        <a href="{{ route('reports.month_wise') }}" class="block">
                            <h5 class="text-xl font-semibold text-blue-700 mb-0">Monthly Wise Report</h5>
                        </a>
                    </div>
                </div>
                <div class="w-full sm:w-72">
                    <div class="bg-white rounded shadow p-6 text-center hover:shadow-lg transition">
                        <a href="{{ route('reports.not_returned') }}" class="block">
                            <h5 class="text-xl font-semibold text-blue-700 mb-0">Not Returned</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
