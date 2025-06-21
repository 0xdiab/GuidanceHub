@extends('layouts.app')

{{-- Page Name --}}
@section('page_name')
    About us
@endsection

{{-- Content --}}
@section('content')
<div class=" vh-100 d-flex justify-content-center" style="padding: 100px 0; text-align: left; background-color: #FFF5E4">
        <div class="container" style="max-width: 800px;">
            <h1 class="fw-bold mb-5" style="font-size: 36px;">About <span style="color: #ff8436;">GuidanceHub</span></h1>
            <p style="font-size: 18; line-height: 1.6;">
GuidanceHub is an innovative web application designed to connect mentors and mentees across a wide range of professional fields. The platform serves as a bridge between individuals seeking expert advice and seasoned professionals eager to share their knowledge and experience.

At its core, 
<p>GuidanceHub offers a seamless experience for mentees to search for mentors based on their specialization, book paid mentorship sessions, and engage in virtual meetings via tools like Zoom or Google Meet. This streamlined process ensures that guidance is accessible, flexible, and tailored to the mentee’s goals.</p>

<p>The platform features a robust and intuitive admin dashboard that enables comprehensive management of all relevant data. This includes oversight of mentors, mentees, specializations, skills, and system administrators.</p> <p>By centralizing this information, GuidanceHub ensures an efficient and user-friendly environment for all participants.

Our mission is to empower individuals by simplifying access to mentorship and fostering meaningful professional relationships. Whether you're a mentee looking to grow or a mentor ready to make an impact, GuidanceHub provides the tools to make mentorship effective, accessible, and rewarding.</p>
</p>
        </div>
    </div>
@endsection