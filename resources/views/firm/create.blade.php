@extends('layouts.serviceprovider')
@section('heading','Add New Firm')
    <!-- <head>
        <link rel="stylesheet" href="{{ asset('css/firmform.css') }}">
    </head> -->
   @section('content')
   <div>
    <div class="max-w-md mx-auto my-12 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-center text-2xl font-bold">Firm Registration</h2>
        <form action="/firm" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="firm_name" class="block mt-4 mb-1">Firm Name <span class="text-red-500 font-bold">*</span></label>
            <input type="text" id="firm_name" name="firm_name" required class="w-full p-2 border border-gray-300 rounded">

            <label for="firm_mobile" class="block mt-4 mb-1">Firm Mobile <span class="text-red-500 font-bold">*</span></label>
            <input type="tel" id="firm_mobile" name="firm_mobile" required class="w-full p-2 border border-gray-300 rounded">

            <label for="firm_email" class="block mt-4 mb-1">Firm Email <span class="text-red-500 font-bold">*</span></label>
            <input type="email" id="firm_email" name="firm_email" required class="w-full p-2 border border-gray-300 rounded">

            <label for="business_type" class="block mt-4 mb-1">Select Business Type:</label>
            <select id="business_type" name="business_type" class="w-full p-2 border border-gray-300 rounded">
                <option value="select">Select</option>
                <option value="sole proprietorship">Sole Proprietorship</option>
                <option value="partnership firm">Partnership Firm</option>
                <option value="llp">Limited Liability Partnership (LLP)</option>
                <option value="pvt_ltd">Private Limited Company (Pvt. Ltd.)</option>
                <option value="public_ltd">Public Limited Company (Ltd.)</option>
                <option value="huf">Hindu Undivided Family (HUF)</option>
                <option value="other">Other</option>
            </select>

            <label for="since" class="block mt-4 mb-1">Since (Date)</label>
            <input type="date" id="since" name="since" class="w-full p-2 border border-gray-300 rounded">

            <label for="address_line_1" class="block mt-4 mb-1">Address Line 1 <span class="text-red-500 font-bold">*</span></label>
            <input type="text" id="address_line_1" name="address_line_1" required class="w-full p-2 border border-gray-300 rounded">

            <label for="address_line_2" class="block mt-4 mb-1">Address Line 2 <span class="text-red-500 font-bold">*</span></label>
            <input type="text" id="address_line_2" name="address_line_2" required class="w-full p-2 border border-gray-300 rounded">

            <label for="city" class="block mt-4 mb-1">City <span class="text-red-500 font-bold">*</span></label>
            <input type="text" id="city" name="city" required class="w-full p-2 border border-gray-300 rounded">

            <label for="state" class="block mt-4 mb-1">State <span class="text-red-500 font-bold">*</span></label>
            <input type="text" id="state" name="state" required class="w-full p-2 border border-gray-300 rounded">

            <label for="country" class="block mt-4 mb-1">Country <span class="text-red-500 font-bold">*</span></label>
            <input type="text" id="country" name="country" required class="w-full p-2 border border-gray-300 rounded">

            <label for="pincode" class="block mt-4 mb-1">Pincode <span class="text-red-500 font-bold">*</span></label>
            <input type="text" id="pincode" name="pincode" required class="w-full p-2 border border-gray-300 rounded">

            <label for="pan_no" class="block mt-4 mb-1">PAN No (optional)</label>
            <input type="text" id="pan_no" name="pan_no" class="w-full p-2 border border-gray-300 rounded">

            <label for="registration_number" class="block mt-4 mb-1">Registration No (optional)</label>
            <input type="text" id="registration_number" name="registration_number" class="w-full p-2 border border-gray-300 rounded">

            <label for="gst_no" class="block mt-4 mb-1">GST No (optional)</label>
            <input type="text" id="gst_no" name="gst_no" class="w-full p-2 border border-gray-300 rounded">

            <label for="map" class="block mt-4 mb-1">Map Link (optional)</label>
            <input type="text" id="map" name="map" class="w-full p-2 border border-gray-300 rounded">

            <label for="profilepic" class="block mt-4 mb-1">Profile Picture (optional)</label>
            <input type="file" id="profilepic" name="profilepic" accept="image/*" class="w-full p-2 border border-gray-300 rounded">

            <button type="submit" class="w-1/2 p-2 bg-blue-600 text-white rounded hover:bg-black block mx-auto mt-4">Register</button>
        </form>
    </div>
</div>
@endsection