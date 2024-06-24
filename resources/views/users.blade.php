<!-- resources/views/users.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Users List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No.</th>
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
                @php
                    $i = ($customers->currentPage() - 1) * $customers->perPage() + 1;
                @endphp
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$i}}</td>
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
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>

         <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $customers->links('vendor.pagination.bootstrap-4') }}
    </div>
    </div>
</body>
</html>
