<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use Illuminate\Http\Request;
use Zxing\QrReader;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

// Data Export
use App\Exports\CheckinDataExport;

// Mail
use App\Mail\QRCodeMail;

// Models
use App\Models\MailHistory;
use App\Models\User;
use App\Models\Purchase;


class CheckInController extends Controller
{
    public function processQRCode(Request $request)
    {
        dd($request);
        $dataURL = $request->input('image');

        // Decode the base64 image string
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataURL));

        // Save the image temporarily
        $tempImagePath = storage_path('app/temp_qr.png');
        file_put_contents($tempImagePath, $imageData);

        // Decode the QR code
        $qrcode = new QrReader($tempImagePath);
        $text = $qrcode->text();

        // Delete the temporary image
        unlink($tempImagePath);

        return response()->json(['qrCode' => $text]);
    }

    public function qrCodeMail()
    {
        $user = Purchase::where('status', '=' , 'paid')->get();
        foreach ($user as $u) {
            MailHistory::create([
                'user_id' => $u->user_id,
            ]);
            Mail::to($u->user->email)->send(new QrCodeMail($u->user_id));
        }
        return back()->with('success', 'QR Code has been sent to all users.');
    }

    public function checkinExport()
    {
        return Excel::download(new CheckinDataExport, 'checkins.xlsx');
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

        $user = User::find($validatedData['user_id']);
        $checkInCheck = CheckIn::where('user_id', $user->id)->first();

        try {
            if ($checkInCheck) {
                return response()->json([
                    'message' => $user->complete_name . ' already checked in',
                ], 400);
            } else {
                CheckIn::create($validatedData);
                return response()->json([
                    'message' => $user->complete_name . ' checked in successfully',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to check in',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function checkInByEmail(Request $request){
        $user = User::where('email', $request->email)->first();
        $checkInCheck = CheckIn::where('user_id', $user->id)->first();

        try {
            if ($checkInCheck) {
                return back()->with('success', $user->complete_name . ' already checked in');
            } else {
                CheckIn::create([
                    'user_id' => $user->id,
                ]);
                return back()->with('success', 'Check in success');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to check in');
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
