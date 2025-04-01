@extends('layouts.userlay')
@section('content')
<div class="row">
            <main class="col-md-9 offset-md-3 content" id="content">
                <h4>Available Firms</h4>
                <div id="firmList">
                    <div class="firm-card">
                        <h5>ABC Healthcare</h5>
                        <p>Specialized in medical consultations.</p>
                        <button class="book-btn">Book Appointment</button>
                    </div>
                    <div class="firm-card">
                        <h5>XYZ Law Firm</h5>
                        <p>Legal consultancy services.</p>
                        <button class="book-btn">Book Appointment</button>
                    </div>
                </div>
            </main>
        </div>
@endsection 

       