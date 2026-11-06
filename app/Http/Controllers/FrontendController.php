<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerEnquiry;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function sendBanner(Request $request)
    {
        // 1. Validate the incoming form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'residence_type' => 'required'
        ]);

        // 2. Return JSON error if validation fails (quick_enquiry.js expects this format)
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()]);
        }

        // 3. Save to the database
        BannerEnquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'residence_type' => $request->residence_type,
            'messages' => $request->messages,
            'page_url' => $request->page_url,
        ]);

        // 4. Return success response (triggers the Google Ads conversion in JS)
        return response()->json([
            'status' => 1, 
            'msg' => 'Thank you! We will get in touch shortly.'
        ]);
    }
}