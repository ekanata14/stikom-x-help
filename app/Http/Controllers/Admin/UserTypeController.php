<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\UserType;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => 'Users Management',
            'activePage' => 'user-types',
            'userTypes' => UserType::all(),
        ];

        return view('admin-dashboard.user-types.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewData = [
            'title' => 'Add User Type',
            'activePage' => 'user-types'
        ];

        return view('admin-dashboard.user-types.create', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
        ]);

        UserType::create($validatedData);

        return redirect()->route('user-types.index')
            ->with('success', 'User Type created successfully.');
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
        $viewData = [
            'title' => 'Edit User Type',
            'activePage' => 'user-types',   
            'userType' => UserType::find($id),
        ];

        return view('admin-dashboard.user-types.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'type_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
        ]);

        UserType::where('id', $validatedData['id'])
            ->update(['type_name' => $validatedData['type_name'], 'region' => $validatedData['region']]);

        return redirect()->route('user-types.index')->with('success', 'User Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserType::destroy($id);

        return redirect()->route('user-types.index')->with('success', 'User Type deleted successfully.');
    }
}
