<h4 class="border-bottom pb-3">Company Information</h4>

<form action="{{ route('company.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Company Name</label>
                <input required name="name" type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" value="{{ auth()->user()->name }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="email" class="form-label">Company Email Address</label>
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

<h4 class="border-bottom pb-3">Company Information</h4>

<form action="{{ route('company.contact.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="contactName" class="form-label">Contact Name</label>
                <input required name="name" type="text" class="form-control" id="contactName" placeholder="Enter Contact Name" value="{{ auth()->user()->contact->name ?? '' }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3">
                <label for="contactEmail" class="form-label">Company Email Address</label>
                <input required type="email" name="email" class="form-control" id="contactEmail" placeholder="Enter Contact Email Address" value="{{ auth()->user()->contact->email ?? '' }}">
            </div>
        </div>

        <!--end col-->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="contactPhone" class="form-label">Contact Phone Number</label>
                <input required name="phone" type="text" class="form-control" id="contactPhone" placeholder="Enter Contact Phone Number" value="{{ auth()->user()->contact->phone ?? '' }}">
            </div>
        </div>

    </div>
    <!--end row-->
    <button class="btn btn-primary">+ Save Contact Profile</button>
</form>

