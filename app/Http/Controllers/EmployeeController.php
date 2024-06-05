<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Employee::all();
        return view('EmployeeList', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('AddEmployee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $gender = $request->get('gender');
        $age = $request->get('age');
        $email = $request->get('email');
        $mobile_number = $request->get('mobile_number');
        $address = $request->get('address');

        Employee::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $gender,
            'age' => $age,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'address' => $address
        ]);
        return response()->json(['success' => true, 'message' => 'Employee Added Successfully...']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Employee::find($id);
        return view('EditEmployee', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $gender = $request->get('gender');
        $age = $request->get('age');
        $email = $request->get('email');
        $mobile_number = $request->get('mobile_number');
        $address = $request->get('address');
        $employee = Employee::find($id);
        if ($employee) {
            $employee->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'gender' => $gender,
                'age' => $age,
                'email' => $email,
                'mobile_number' => $mobile_number,
                'address' => $address,
            ]);
            return response()->json(['success' => true, 'message' => 'Employee updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Employee not found.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employee = Employee::find($id);
        if ($employee) {
            $employee->delete();
            return response()->json(['success' => true, 'message' => 'Employee deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Employee not found.']);
        }
    }
}
