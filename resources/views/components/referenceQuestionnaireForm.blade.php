@php
    $actionRoute = route('reference.questionnaire.save', ['otp' => $reference->otp]);
    $isAdmin = auth()?->user()?->isAdmin();

    if ($isAdmin) {
        $actionRoute = route('referencecheck.store');
    }

    $prevPunctuality = $referenceCheck?->punctuality ?? old('punctuality');
    $prevProblemSolving = $referenceCheck?->problem_solving ?? old('problem_solving');
    $prevCommunication = $referenceCheck?->communication ?? old('communication');
    $prevProfessionalism = $referenceCheck?->professionalism ?? old('professionalism');
    $prevSuitability = $referenceCheck?->suitability ?? old('suitability');
@endphp

<form id="create-request" action="{{ $actionRoute }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            
            <div class="mb-4">
                <h5>Applicant Name: {{$reference->application->user->name}}</h5>
                <p>Application for position of Web Development Intern</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Duration and Capacity</label>
                <p>How long, and in what capacity have you known the candidate?</p>
                <textarea class="form-control @error('duration_capacity') is-invalid @enderror" name="duration_capacity" id="" cols="30" rows="10" placeholder="Enter Duration and Capacity" required>{{$referenceCheck?->duration_capacity ?? old('duration_capacity')}}</textarea>

                @error('duration_capacity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Performance</label>
                <p>Can you provide examples of projects or activities the candidate was involved with? How did they handle these projects or activities?</p>
                <textarea class="form-control @error('performance') is-invalid @enderror" name="performance" id="" cols="30" rows="10" placeholder="Enter Performance" required>{{$referenceCheck?->performance ?? old('performance')}}</textarea>

                @error('performance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Teamwork</label>
                <p>Does the applicant work well in a team setting? Can you provide an example where they demonstrated good teamwork?</p>
                <textarea class="form-control  @error('teamwork') is-invalid @enderror" name="teamwork" id="" cols="30" rows="10" placeholder="Enter Teamwork" required>{{$referenceCheck?->teamwork ?? old('teamwork')}}</textarea>
                
                @error('teamwork')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label @error('punctuality') is-invalid @enderror">Reliability and Punctuality</label>
                <p>How reliable was the candidate in arriving and completing tasks on time?</p>
                
                <div class="form-check mb-1">
                    <label class="form-check-label" for="punctuality-poor">(1) Poor</label>
                    <input type="radio" class="form-check-input" id="punctuality-poor" name="punctuality" value="1" required <?php echo ($prevPunctuality == 1)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="punctuality-satisfactory">(2) Satisfactory</label>
                    <input type="radio" class="form-check-input" id="punctuality-satisfactory" name="punctuality" value="2" required <?php echo ($prevPunctuality == 2)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="punctuality-good">(3) Good</label>
                    <input type="radio" class="form-check-input" id="punctuality-good" name="punctuality" value="3" required <?php echo ($prevPunctuality == 3)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="punctuality-very-good">(4) Very Good</label>
                    <input type="radio" class="form-check-input" id="punctuality-very-good" name="punctuality" value="4" required <?php echo ($prevPunctuality == 4)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="punctuality-excellent">(5) Excellent</label>
                    <input type="radio" class="form-check-input" id="punctuality-excellent" name="punctuality" value="5" required <?php echo ($prevPunctuality == 5)?'checked':''?>/>
                </div>

                @error('punctuality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label @error('problem_solving') is-invalid @enderror">Problem Solving</label>
                <p>How would you rate the applicant's problem solving skills?</p>
                
                <div class="form-check mb-1">
                    <label class="form-check-label" for="problem-solving-poor">(1) Poor</label>
                    <input type="radio" class="form-check-input" id="problem-solving-poor" name="problem_solving" value="1" required <?php echo ($prevProblemSolving == 1)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="problem-solving-satisfactory">(2) Satisfactory</label>
                    <input type="radio" class="form-check-input" id="problem-solving-satisfactory" name="problem_solving" value="2" required <?php echo ($prevProblemSolving == 2)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="problem-solving-satisfactory">(3) Good</label>
                    <input type="radio" class="form-check-input" id="problem-solving-good" name="problem_solving" value="3" required <?php echo ($prevProblemSolving == 3)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="problem-solving-very-good">(4) Very Good</label>
                    <input type="radio" class="form-check-input" id="problem-solving-very-" name="problem_solving" value="4" required <?php echo ($prevProblemSolving == 4)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="problem-solving-very-excellent">(5) Excellent</label>
                    <input type="radio" class="form-check-input" id="problem-solving-excellent" name="problem_solving" value="5" required <?php echo ($prevProblemSolving == 5)?'checked':''?>/>
                </div>

                @error('problem_solving')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label @error('communication') is-invalid @enderror">Communication Skills</label>
                <p>How would you rate the applicant's communication skills?</p>
                
                <div class="form-check mb-1">
                    <label class="form-check-label" for="communication-poor">(1) Poor</label>
                    <input type="radio" class="form-check-input" id="communication-poor" name="communication" value="1" required <?php echo ($prevCommunication == 1)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="communication-satisfactory">(2) Satisfactory</label>
                    <input type="radio" class="form-check-input" id="communication-satisfactory" name="communication" value="2" required <?php echo ($prevCommunication == 2)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="communication-good">(3) Good</label>
                    <input type="radio" class="form-check-input" id="communication-good" name="communication" value="3" required <?php echo ($prevCommunication == 3)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="communication-very">(4) Very Good</label>
                    <input type="radio" class="form-check-input" id="communication-very" name="communication" value="4" required <?php echo ($prevCommunication == 4)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="communication-excellent">(5) Excellent</label>
                    <input type="radio" class="form-check-input" id="communication-excellent" name="communication" value="5" required <?php echo ($prevCommunication == 5)?'checked':''?>/>
                </div>

                @error('communication')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label @error('professionalism') is-invalid @enderror">Professionalism</label>
                <p>How would you rate the applicant's level of professionalism?</p>
                
                <div class="form-check mb-1">
                    <label class="form-check-label" for="professionalism-very-poor">(1) Poor</label>
                    <input type="radio" class="form-check-input" id="professionalism-very-poor" name="professionalism" value="1" required <?php echo ($prevProfessionalism == 1)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="professionalism-poor">(2) Satisfactory</label>
                    <input type="radio" class="form-check-input" id="professionalism-poor" name="professionalism" value="2" required <?php echo ($prevProfessionalism == 2)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="professionalism-satisfactory">(3) Good</label>
                    <input type="radio" class="form-check-input" id="professionalism-satisfactory" name="professionalism" value="3" required <?php echo ($prevProfessionalism == 3)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="professionalism-good">(4) Very Good</label>
                    <input type="radio" class="form-check-input" id="professionalism-good" name="professionalism" value="4" required <?php echo ($prevProfessionalism == 4)?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="professionalism-very-good">(5) Excellent</label>
                    <input type="radio" class="form-check-input" id="professionalism-very-good" name="professionalism" value="5" required <?php echo ($prevProfessionalism == 5)?'checked':''?>/>
                </div>

                @error('professionalism')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label @error('suitability') is-invalid @enderror">Suitability</label>
                <p>Considering the role they have applied for (Web Development Intern), do you think they are a good fit for this position?</p>
                
                <div class="form-check mb-1">
                    <label class="form-check-label" for="suitability-no">No</label>
                    <input type="radio" class="form-check-input" id="suitability-no" name="suitability" value="no" required <?php echo ($prevSuitability == "no")?'checked':''?>/>
                </div>

                <div class="form-check mb-1">
                    <label class="form-check-label" for="suitability-yes">Yes</label>
                    <input type="radio" class="form-check-input" id="suitability-yes" name="suitability" value="yes" required <?php echo ($prevSuitability == "yes")?'checked':''?>/>
                </div>

                @error('suitability')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label @error('additional_comments') is-invalid @enderror">Additional Comments (Optional)</label>
                <p>Is there anything else you would like to add that has not been covered?</p>
                <textarea class="form-control" name="additional_comments" id="" cols="30" rows="10" placeholder="Enter Additional Comments">{{$referenceCheck?->additional_comments ?? old('additional_comments')}}</textarea>

                @error('additional_comments')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <input type="hidden" name="reference_id" value="{{$reference->id}}"/>
        </div>
        <!--end col-->
    </div>
    <!-- end row -->

    <div class="text-end mb-4">
        <a href="{{ route('referencecheck.store') }}" onclick="event.preventDefault(); document.getElementById('create-request').submit();" class="btn btn-success h-l w-xl">Save Changes</a>
    </div>
</form>