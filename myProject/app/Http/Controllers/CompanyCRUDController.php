<?php
namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
class CompanyCRUDController extends Controller
{
/**
* Hiện danh sách dữ liệu
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['companies'] = Company::orderBy('id','desc')->paginate(5);
return view('index', $data);
}
/**
*Hiển thị biểu mẫu để tạo dữ liệu mới.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('create');
}
/**
* Lưu trữ một dữ liệu mới được tạo trong bộ nhớ.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'name' => 'required',
'email' => 'required',
'address' => 'required'
]);
$company = new Company;
$company->name = $request->name;
$company->email = $request->email;
$company->address = $request->address;
$company->save();
return redirect()->route('companies.index')
->with('success','Đã thêm thành viên thành công');
}
/**
* Display the specified resource.
*
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function show(Company $company)
{
return view('show',compact('company'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function edit(Company $company)
{
return view('edit',compact('company'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\company  $company
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
'name' => 'required',
'email' => 'required',
'address' => 'required',
]);
$company = Company::find($id);
$company->name = $request->name;
$company->email = $request->email;
$company->address = $request->address;
$company->save();
return redirect()->route('companies.index')
->with('success','Sửa thông tin thành viên thành công');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Company  $company
* @return \Illuminate\Http\Response
*/
public function destroy(Company $company)
{
$company->delete();
return redirect()->route('companies.index')
->with('success','Đã xóa thành công');
}
}