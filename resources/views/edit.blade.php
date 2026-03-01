<!DOCTYPE html>
<html>
<head>
<title>Edit CV</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<div class="card p-4 shadow col-md-4 mx-auto">
<h3>Edit CV</h3>
<form action="/update/{{ $cv->id }}" method="POST">
@csrf
<input type="text" name="name" class="form-control mb-3" value="{{ $cv->name }}" required>
<select name="sector" class="form-control mb-3">
<option @if($cv->sector=='Full Stack Development') selected @endif>Full Stack Development</option>
<option @if($cv->sector=='Mobile Development') selected @endif>Mobile Development</option>
<option @if($cv->sector=='DevOps') selected @endif>DevOps</option>
<option @if($cv->sector=='Cyber Security') selected @endif>Cyber Security</option>
<option @if($cv->sector=='UI/UX Design') selected @endif>UI/UX Design</option>
</select>
<button class="btn btn-primary w-100">Update</button>
</form>
</div>
</div>
</body>
</html>