@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.intern.pdf') }}" method="post">
                @csrf
                <div class="card">
                    <input type="hidden" name="id" value="{{ $id }}">
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
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="positionType" class="form-label">Select Position</label>
                                        <select name="type" class="form-control form-control-lg @error('type') is-invalid @enderror" id="positionType" onchange="updatePreview()">
                                            <option disabled selected>-- Select Position --</option>
                                            <option value="paid">Paid Intern</option>
                                            <option value="volunteer">Volunteer Intern</option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" name="startDate" class="form-control form-control-lg @error('startDate') is-invalid @enderror" id="startDate" onchange="updatePreview()">
                                        @error('startDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" name="endDate" class="form-control form-control-lg @error('endDate') is-invalid @enderror" id="endDate" onchange="updatePreview()">
                                        @error('endDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="location" class="form-label">Location</label>
                                        <input placeholder="Enter Job Location " type="text" name="location" class="form-control form-control-lg @error('location') is-invalid @enderror" id="location" onkeyup="updatePreview()">
                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                <div style="text-align: right">
                                    <button onclick="return confirm('Are your sure you wanna send this mail?')" class="btn btn-primary">Generate PDF ({{ $name }})</button>
                                </div>
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
                                <h3 style="text-align: center">Offer letter for the position of an Intern - Software Development.</h3>
                                <div class="header">
                                    <img src="https://summerweb.cencadian.ca/front/assets/img/logo-black.png" alt="CENCADIAN Educational Incorporated">
                                    <p>
                                        262 Tanager Trail, Winnipeg, MB<br>
                                        Phone: <a href="tel:12049300378">(204) 930 0378</a><br>
                                        Email: <a href="mailto:admin@cencadian.ca">admin@cencadian.ca</a><br>
                                        Web: <a href="http://www.summerweb.cencadian.ca">www.summerweb.cencadian.ca</a>
                                    </p>
                                </div>
                                <div class="content">
                                    <p>{{ date('M d, Y') }}</p>
                                    <p id="previewName">{{ $name }}</p>
                                    <p id="previewEmail">{{ $email }}</p>
                                    <p id="previewAddress">{{ $address }}</p>
                                    <br>
                                    <p>Dear <span class="name">{{ $name }}</span>,</p>
                                    <p>We are pleased to offer you the position of Web Development Intern at the Cencadian Summer Web Development Program. We are pleased with your background and skills, and we are excited about the potential you bring to our team.</p>
                                    <p id="note"></p>
                                    <p><strong>Position:</strong> <span id="previewPosition">Web Development Intern (Paid)</span><br>
                                        <strong>Start Date:</strong> <span id="previewStartDate">[Start Date]</span><br>
                                        <strong>End Date:</strong> <span id="previewEndDate">[End Date, if applicable]</span><br>
                                        <strong>Reporting To:</strong> Cencadian Administrative Staff</p>
                                    <p><strong>Location:</strong> <span id="previewLocation"></span></p>
                                    <p><strong>Compensation:</strong><br>
                                        <span id="compensation"></span></p>
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
                                    <p>Yours sincerely,<br><br>
                                        Summer Web Development Program<br>
                                        admin@cencadian.ca</p>
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <script>
        function updatePreview() {
            const positionType = document.getElementById('positionType').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const location = document.getElementById('location').value;

            document.getElementById('note').innerText = positionType === 'paid' ? '' : 'Even though this is a volunteering position, you are expected to be committed to the days and hours of work required for this position. The terms and conditions of your volunteering appointment with us are as follows:';
            document.getElementById('compensation').innerText = positionType === 'paid' ? 'As this is a paid internship position, you will be allocated 30 hours per week a wage of $15.30 per hour, payable in bi-weekly installments.' : 'While we appreciate your effort to acquire skills that would be of benefit to the community, it is important that you note and accept that voluntary work by its very name means that there is no wage associated with this position. As such the usual conditions and entitlements which apply in paid employment situations do not exist. The skills you acquire during this program will equip you for future employment and career opportunities.';
            document.getElementById('previewPosition').innerText = positionType === 'paid' ? 'Web Development Intern (Paid)' : 'Web Development Intern (Volunteer)';
            document.getElementById('previewStartDate').innerText = startDate ? startDate : '[Start Date]';
            document.getElementById('previewEndDate').innerText = endDate ? endDate : '[End Date, if applicable]';
            document.getElementById('previewLocation').innerText = location ? location : '[Job Location]';
        }
    </script>
@endsection
