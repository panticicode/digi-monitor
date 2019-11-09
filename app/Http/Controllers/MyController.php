<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
  
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export_xlsx() 
    {
        $data = 'Member';
        return Excel::download(new UsersExport, 'members.xlsx');
    }
    public function export_xls() 
    {
        $data = 'Member';
        return Excel::download(new UsersExport, 'members.xls');
    }
    public function export_csv() 
    {
        $data = 'Member';
        return Excel::download(new UsersExport, 'members.csv');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back()->with('success', 'Insert Record successfully.');
    }
}