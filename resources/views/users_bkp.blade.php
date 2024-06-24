@extends('layout.layout')

@section('title', 'Profile Page')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h2>Users List</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Phone 1</th>
                    <th>Phone 2</th>
                    <th>Email</th>
                    <th>Subscription Date</th>
                    <th>Website</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->company }}</td>
                        <td>{{ $customer->city }}</td>
                        <td>{{ $customer->country }}</td>
                        <td>{{ $customer->phone1 }}</td>
                        <td>{{ $customer->phone2 }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->subscription_date }}</td>
                        <td>{{ $customer->website }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $customers->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection
