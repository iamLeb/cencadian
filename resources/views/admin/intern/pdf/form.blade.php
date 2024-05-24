@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.intern.pdf') }}" method="post">
                @csrf
                <div class="card">
                    <input type="hidden" value="{{ $id }}">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">{{ __('Generating Offer Letter | ' . ucfirst($name)) }}</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="form-grid-showcode" class="form-label text-muted">Preview Offer Letter</label>
                                <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-6">
                                    <div>
                                        <label for="basiInput" class="form-label">Select Position</label>
                                        <select name="type" class="form-control form-control-lg" id="">
                                            <option disabled selected>-- Select Position --</option>
                                            <option value="paid">Paid Intern</option>
                                            <option value="volunteer">Volunteer Intern</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" name="startDate" class="form-control form-control-lg" id="startDate">
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" name="endDate" class="form-control form-control-lg" id="endDate">
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="reportingTo" class="form-label">Reporting to</label>
                                        <select name="reportingTo" class="form-control form-control-lg" id="">
                                            <option selected disabled">-- Who should {{ $name }} report to?</option>
                                            @foreach(\App\Models\User::where('type', 'admin')->get() as $user)
                                                <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="location" class="form-label">Location</label>
                                        <input placeholder="Enter Job Location " type="text" name="location" class="form-control form-control-lg" id="location">
                                    </div>
                                </div>
                                <!--end col-->

                                <button class="btn btn-primary ">Generate PDF ({{ $name }})</button>

                            </div>
                            <!--end row-->
                        </div>

                        <div class="d-none code-view">
                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Offer Letter for Intern Position</title>
                                <style>
                                    body {
                                        font-family: Arial, sans-serif;
                                        line-height: 1.6;
                                    }
                                    .container {
                                        width: 80%;
                                        margin: 0 auto;
                                    }
                                    .header {
                                        text-align: center;
                                    }
                                    .header img {
                                        max-width: 100%;
                                        height: auto;
                                    }
                                    .content {
                                        margin-top: 20px;
                                    }
                                    .signature {
                                        margin-top: 20px;
                                    }
                                </style>
                            </head>
                            <body>
                            <div class="container">
                                <div class="header">
                                    <img src="https://summerweb.cencadian.ca/front/assets/img/logo-black.png" alt="CENCADIAN Educational Incorporated">
                                    <p>
                                        262 Tanager Trail, Winnipeg, MB<br>
                                        Phone: <a href="tel:12049300378"></a>(204) 930 0378<br>
                                        Email: <a href="mailto:admin@cencadian.ca">admin@cencadian.ca</a><br>
                                        Web: <a href="http://www.summerweb.cencadian.ca">www.summerweb.cencadian.ca</a>
                                    </p>
                                </div>
                                <div class="content">
                                    <p>{{ date('M d, Y') }}</p>
                                    <p>{{ $name }}<br>
                                        {{ $email }}<br>
                                        {{ $address }}</p> <br>
                                    <p>Dear {{ $name }},</p>
                                    <p>We are pleased to offer you the position of Web Development Intern at the Cencadian Summer Web Development Program. We are pleased with your background and skills, and we are excited about the potential you bring to our team.</p>
                                    <p><strong>Position:</strong> Web Development Intern (Paid)<br>
                                        <strong>Start Date:</strong> [Start Date]<br>
                                        <strong>End Date:</strong> [End Date, if applicable]<br>
                                        <strong>Reporting To:</strong> [Supervisor’s Name], [Supervisor’s Title]</p>
                                    <p><strong>Location:</strong></p>
                                    <p><strong>Compensation:</strong><br>
                                        As this is a paid internship position, you will be allocated 30 hours per week a wage of $15.30 per hour, payable in bi-weekly installments.</p>
                                    <p><strong>Work Hours:</strong><br>
                                        Your regular hours of work will be 10am to 4pm, 5 days per week Monday-Friday. Please note that some flexibility might be required to meet project deadlines.</p>
                                    <p><strong>Onboarding:</strong><br>
                                        You will be required to attend a mandatory in-person staff onboarding session on the specified start date.</p>
                                    <p><strong>Termination:</strong><br>
                                        This contract can be terminated with immediate effect by the Employer on grounds of indiscipline or under-performance.</p>
                                    <p><strong>Company Policies:</strong><br>
                                        You will be required to abide by existing company policies that pertain to your position, which can be reviewed from time to time.</p>
                                    <p><strong>Diversity and Inclusion:</strong><br>
                                        Should you need some form of workplace accommodation to perform your job more effectively, please let us know.</p>
                                    <p><strong>Duties and Responsibilities:</strong></p>
                                    <ul>
                                        <li>Assist in the development and maintenance of software applications.</li>
                                        <li>Collaborate with the development team on various projects.</li>
                                        <li>Participate in the testing and improvement of software development processes.</li>
                                        <li>Attend and contribute to team meetings and company training sessions.</li>
                                    </ul>
                                    <p><strong>Conditions:</strong></p>
                                    <ul>
                                        <li>This internship is contingent upon the successful completion of a background check.</li>
                                        <li>You will be required to sign a confidentiality agreement to protect the proprietary technology and information of our client companies.</li>
                                    </ul>
                                    <p><strong>Amendment and Enforcement:</strong><br>
                                        Any alterations or amendment to this contract shall be duly communicated in writing taking into consideration both the employer’s and employee’s views.</p>
                                    <p>We hope you find your employment with us exciting, and we wish you every success during your employment with CENCADIAN Educational. If the above conditions are agreeable to you, please sign, date, and return this letter to us by email immediately.</p>
                                    <p>Yours sincerely,<br>
                                        [Your Name]<br>
                                        [Your Title]<br>
                                        [Company Name]<br>
                                        [Contact Information]</p>
                                </div>
                                <div class="signature">
                                    <p><strong>Acceptance:</strong></p>
                                    <p>I ____________________________________ (print name) accept the offer for the Web Development Intern position at Cencadian Educational Incorporated as outlined above.</p>
                                    <p>Signature: __________________________</p>
                                    <p>Date: __________________________</p>
                                </div>
                            </div>
                            </body>
                            </html>

                        </>
                    </div>
                </div>
            </form>
        </div>
        <!--end col-->

    </div>
    <!--end row-->
@endsection
