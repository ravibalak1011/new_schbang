<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        $filePath = $request->file('file')->store('uploads');

        $file = fopen(storage_path('app/' . $filePath), 'r');
        $header = fgetcsv($file);

        
        $header = array_map(function($value) {
            return strtolower(str_replace(' ', '_', $value));
        }, $header);

        while ($row = fgetcsv($file)) {
            $data = array_combine($header, $row);
        
            Customer::create([
                'customer_id' => $data['customer_id'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'company' => $data['company'],
                'city' => $data['city'],
                'country' => $data['country'],
                'phone1' => $data['phone_1'],
                'phone2' => $data['phone_2'],
                'email' => $data['email'],
                'subscription_date' => $data['subscription_date'],
                'website' => $data['website'],
            ]);
        }
        fclose($file);

        return redirect()->route('upload.form')->with('success', 'File uploaded and data inserted successfully.');
    }

    public function showUsers()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        return view('users', compact('customers'));
    }
}
