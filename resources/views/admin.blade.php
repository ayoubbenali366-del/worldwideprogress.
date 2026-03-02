<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        
        <h2>Welcome,{{ session('admin_name') }} | <a href="/admin/logout">Logout</a></h2> 

        <div class="alert alert-info">Total CV: {{ $total }}</div>

        <h4>Statistics by Sector</h4>
    <ul>
        @foreach($bySector as $sector)
            <li>{{ $sector->sector }} : {{ $sector->total }}</li>
        @endforeach
    </ul>

    <form method="GET" action="/admin" class="mb-3">
        <input type="text" name="search" placeholder="Search sector" class="form-control">
    </form>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Sector</th>
            <th>CV</th>
            <th>Actions</th>
        </tr>
        @foreach($cvs as $cv)
            <tr>
                <td>{{ $cv->name }}</td>
                <td>{{ $cv->sector }}</td>
                <td><a href="{{ asset('cvs/'.$cv->cv_file) }}" download class="btn btn-success btn-sm">Download</a></td>
                <td>
                    <a href="/edit/{{ $cv->id }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/delete/{{ $cv->id }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>