<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use Illuminate\Http\Request;
use Zxing\QrReader;


class CheckInController extends Controller
{
    public function processQRCode(Request $request){
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = [
            'title' => 'Check In Management',
            'activePage' => 'checkins',
            'checkIns' => CheckIn::with('user')->orderByDesc('created_at')->paginate(10),
        ];
        return view('admin-dashboard.checkin.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
        ]);

        try{
            CheckIn::create($validatedData);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to check in',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckIn $checkIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CheckIn $checkIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckIn $checkIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckIn $checkIn)
    {
        //
    }
}
