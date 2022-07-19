<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 8 CRUD Tutorial From Scratch</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Thực Tập Laravel Tại Alta Software</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('companies.create') }}"> Thêm thành viên mới</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Thứ Tự</th>
<th>Họ và tên</th>
<th>Địa chỉ email</th>
<th>Địa chỉ</th>
<th width="280px">Xóa/Sửa</th>
</tr>
@foreach ($companies as $company)
<tr>
<td>{{ $company->id }}</td>
<td>{{ $company->name }}</td>
<td>{{ $company->email }}</td>
<td>{{ $company->address }}</td>
<td>
<form action="{{ route('companies.destroy',$company->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Sửa</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Xóa</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $companies->links() !!}
</body>
</html>