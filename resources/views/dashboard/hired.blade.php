<h4 class="border-bottom pb-3">Personal Information</h4>

<form action="{{ route('company.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Name</label>
                <input required name="name" type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="{{ auth()->user()->name }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input required readonly disabled type="email" class="form-control" id="emailInput" placeholder="Enter your email" value="{{ auth()->user()->email }}">
            </div>
        </div>

        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input required name="phone" type="text" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" value="{{ auth()->user()->phone ?? '' }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input value="{{ auth()->user()->address }}" required name="address" type="text" class="form-control" id="address" placeholder="Enter Your Address" />
            </div>
        </div>
    </div>
    <!--end row-->
    <button class="btn btn-success">Update Profile</button>
</form>

<hr>
<span class="border-bottom"></span>

<h4 class="border-bottom pb-3">References</h4>

<div class="card">
    <div class="card-body">
        <div class="row">
            @if($references)
                @foreach($references as $reference)
                    <div class="col-md-4 mb-3">
                        <h5>{{$reference->name}}</h5>

                        <p>Relationship: {{$reference->relationship}}</p>
                        <p>Organization: {{$reference->org}}</p>
                        <p>Phone: {{$reference->phone}}</p>
                        <p>Email: {{$reference->email}}</p>
                        <p>Preferred contact: {{$reference->prefContact}}</p>

                        <p>
                            Reference Check Status:
                            @if ($reference->referenceCheck)
                                <a href="javascript:void(0);" class="badge bg-success">Submitted</a>
                            @else
                                <a href="javascript:void(0);" class="badge bg-warning">Not Submitted</a>
                            @endif
                        </p>

                        @php
                            $applicantName = $user?->name ?? "An applicant";

                            $mailtoHref = "mailto:".$reference->email
                            ."?subject=Reference Check for $applicantName - Cencadian Summer Web Development Internship Program"
                            ."&body="
                            ."Hello " . $reference->name . ",%0A%0A"
                            ." You have been listed as a reference by " . $applicantName
                            ." on their application to the Cencadian Summer Web Development Internship Program. "
                            ."Below is a link to a short questionnaire about your experience and relationship with the applicant."
                            ."%0A%0A"
                            .route('reference.questionnaire.show', ['otp' => $reference->otp])
                            ."%0A%0A"
                            ."We would appreciate it if you could take about 5 minutes to complete this short questionnaire so that we can learn more about the applicant."
                            ."%0A%0A"
                            ."If you have any questions or concerns, feel free to reply to this email, or contact us at admin@cencadian.ca"
                            ."%0A%0A"
                            ."Regards,"
                            ."%0A"
                            ."Management Team"
                            ."%0A"
                            ."Cencadian Educational Incorporated";
                        @endphp
                    </div>
                @endforeach
            @else
                <p class="alert alert-danger p-2">Nothing here yet</p>
            @endif
        </div>
    </div>
</div>

<span class="border-bottom"></span>

<h4 class="border-bottom pb-3">Emergency Contacts</h4>

<form action="{{ route('emergency.contact.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="contactName" class="form-label">Contact Name</label>
                <input  name="name" type="text" class="form-control @error('email') is-invalid @enderror" id="contactName" placeholder="Enter Contact Name" value="">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="contactEmail" class="form-label">Company Email Address</label>
                <input  type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="contactEmail" placeholder="Enter Contact Email Address" value="">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="contactpPhone" class="form-label">Contact Primary Phone Number</label>
                <input name="pphone" type="text" class="form-control @error('pphone') is-invalid @enderror" id="contactpPhone" placeholder="Enter Contact Primary Phone Number" value="">
                @error('pphone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--end col-->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="contactsPhone" class="form-label">Contact Secondary Phone Number (<small>Optional</small>)</label>
                <input name="sphone" type="text" class="form-control @error('sphone') is-invalid @enderror" id="contactsPhone" placeholder="Enter Contact Secoundry Phone Number" value="">
                @error('sphone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="address" class="form-label">Contact Address</label>
                <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Contact Address" value="">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="note" class="form-label">Additional Note (<small>Optional</small>)</label>
                <textarea name="note" id="note" cols="30" rows="10" class="form-control" placeholder="Enter any additional Note"></textarea>
            </div>
        </div>

    </div>
    <!--end row-->
    <button type="submit" class="btn btn-primary">+ Save Emergency Information</button>
</form>

