<!DOCTYPE html>
<html>
<head>
<title>WorldwideProgress</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand"> WorldwideProgress</span>
            <a href="/admin/login" class="btn btn-warning btn-sm">Login</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card p-4 shadow">
            <h3>Upload Your CV</h3>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="/store" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>
                <select name="sector" class="form-control mb-3">
                    <option>Full Stack Development</option>
                    <option>Mobile Development</option>
                    <option>DevOps</option>
                    <option>Cyber Security</option>
                    <option>UI/UX Design</option>
                </select>
                <input type="file" name="cv_file" class="form-control mb-3" required>
                <button class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>