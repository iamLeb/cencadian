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
    <h4 style="text-align: center">Offer letter for the position of an Intern - Software Development.</h4>
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
        <p>Even though this is a volunteering position, you are expected to be committed to the days and hours of work required for this position. The terms and conditions of your volunteering appointment with us are as follows:</p>
        <p><strong>Position:</strong> Web Development Intern (Volunteer)<br>
            <strong>Start Date:</strong> {{ $startDate }}<br>
            <strong>End Date:</strong> {{ $endDate }}<br>
            <strong>Reporting To:</strong> Cencadian Administrative Staff</p>
        <p><strong>Location:</strong> {{ $location }}</p>
        <p><strong>Compensation:</strong><br>
            While we appreciate your effort to acquire skills that would be of benefit to the community, it is important that you note and accept that voluntary work by its very name means that there is no wage associated with this position. As such the usual conditions and entitlements which apply in paid employment situations do not exist. The skills you acquire during this program will equip you for future employment and career opportunities.</p>
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
