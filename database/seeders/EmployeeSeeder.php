<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('seeders/data/employees.json'));
        $data = json_decode($json);

        foreach ($data as $employee) {
            // $dob = is_array($employee->dob) ? $employee->dob['date'] : $employee->dob;

            // Convert ISO 8601 date to MySQL datetime format
            $dob = date('Y-m-d H:i:s', strtotime($employee->dob));
            $joiningDate = date('Y-m-d H:i:s', strtotime($employee->joiningDate));

            $status = isset($employee->status) ? $employee->status : 'active';
            DB::table('employee')->insert([
                'firstName' => $employee->firstName,
                'lastName' => $employee->lastName,
                'gender' => $employee->gender,
                // 'dob' => date('Y-m-d H:i:s', strtotime($dob)),
                'dob' => $dob,
                'nid' => $employee->nid,
                'email' => $employee->email,
                'address' => $employee->address,
                'contact' => $employee->contact,
                'department' => $employee->department,
                'designation' => $employee->designation,
                // 'joiningDate' => date('Y-m-d H:i:s', strtotime($employee->joiningDate)),
                'joiningDate' => $joiningDate,
                'salary' => $employee->salary,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}