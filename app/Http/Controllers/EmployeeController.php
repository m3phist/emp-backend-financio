<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $employee;
    public function __construct(){
        $this->employee = new Employee();
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->employee->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employeeData = $request->all();

        // Convert ISO 8601 date to MySQL datetime format
        $employeeData['dob'] = date('Y-m-d H:i:s', strtotime($employeeData['dob']));
        $employeeData['joiningDate'] = date('Y-m-d H:i:s', strtotime($employeeData['joiningDate']));

        return $this->employee->create($employeeData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $employee = $this->employee->find($id); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = $this->employee->find($id);
        $employeeData = $request->all();

        // Convert ISO 8601 date to MySQL datetime format
        $employeeData['dob'] = date('Y-m-d H:i:s', strtotime($employeeData['dob']));
        $employeeData['joiningDate'] = date('Y-m-d H:i:s', strtotime($employeeData['joiningDate']));

        $employee->update($employeeData);
        return $employee;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = $this->employee->find($id);
        return $employee->delete();   
    }
}
