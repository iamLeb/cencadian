@php
    $fieldNames = array('why_interested',
        'career_goals',
        'programming_languages',
        'version_control',
        'software_projects',
        'agile_methodology',
        'approach_debugging',
        'creative_approach',
        'collaboration_example',
        'handle_conflicts',
        'learn_new_skill',
        'ethics_cutting_corners',
        'ethics_late_assignment',
        'behavioral_ownership',
        'behavioral_stressful',
        'behavioral_error',
        'technical_add_two',
        'technical_reverse_string',
        'accept_volunteer',
        'additional_comments'
    );

    $previousNotes = [];

    foreach ($fieldNames as &$fieldName) {
        $previousNotes[$fieldName] = $interview ? $interview[$fieldName] ?? old($fieldName) : old($fieldName);
    }   
@endphp


<form id="create-request" action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            
            <div class="mb-4">
                <h1>Interview Notes</h1>
                <h5>Applicant Name: {{$application->user->name}}</h5>
                <h5>Application for: Web Development Intern</h5>
                
                <h5 class="mb-1">Interviewer:</h5>

                <div class="dropdown mb-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{$interviewer->name}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach ($otherInterviews as &$otherInterview)
                            <a class="dropdown-item" href="{{route('show.interview.notes', ['applicationId' => $otherInterview->application_id, 'interviewerId' => $otherInterview->interviewer_id])}}">
                                {{$otherInterview?->interviewer?->name ?? "Interviewer"}}
                            </a>
                        @endforeach

                        @if (!$otherInterviews or count($otherInterviews) == 0)
                            <a class="dropdown-item">
                                No other interviewer has written notes on this application.
                            </a>
                        @endif
                    </div>
                  </div>
            </div>

            <div class="mb-4">
                <h3>Preamble</h3>
                <ul style="font-size:16px">
                    <li>The 2024 Cencadian Summer Web Development Program was aimed to provide Web Development Services at little to no cost to new or existing small to medium scale organizations within community that might not be able to afford the huge cost of web development and maintenance. This program is funded in part by Green Team Manitoba.</li>
                    <li>The Web Development interns will be trained to assist in updating and editing content for existing and new websites, creating and editing web page templates, and assisting in other web-related projects as necessary.</li>
                    <li>The interns will gain practical, hands-on experience in web development by actively contributing to real projects.</li>
                    <li>The Program will foster leadership skills in the Green Team employees (interns) through project ownership, client interaction, and problem-solving.</li>
                    <li>The program will emphasize practical skills, tools, and industry best practices for effective web development.</li>
                    <li>Interns will receive regular supervision from experienced industrial mentors.</li>
                    <li>This initiative targets those seeking to establish or enhance their online presence, enabling them to reach a wider audience and thrive in the digital landscape.</li>
                </ul>

                <p style="font-size:16px; text-decoration:underline">Do you have any questions for us before we begin?</p>
            </div>


            <div class="mb-4">
                <h3>Interest and Motivation</h3>

                <label class="form-label">Why are you interested in a web development internship with our company?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="why_interested" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['why_interested']}}</textarea>
                @else
                    <p>{{$previousNotes['why_interested']}}</p>
                @endif

                <label class="form-label">What are your career goals, and how does this internship fit into them?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="career_goals" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['career_goals']}}</textarea>
                @else
                    <p>{{$previousNotes['career_goals']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Basic Technical Knowledge</h3>

                <label class="form-label">Have you worked with any programming languages before? If so, which languages?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="programming_languages" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['programming_languages']}}</textarea>
                @else
                    <p>{{$previousNotes['programming_languages']}}</p>
                @endif

                <label class="form-label">How do you manage version control in your projects? Are you familiar with Git?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="version_control" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['version_control']}}</textarea>
                @else
                    <p>{{$previousNotes['version_control']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Project Experience</h3>

                <label class="form-label">Have you worked on any software projects? If so, tell us about a software project you have worked on. What role did you play, and what technologies did you use? If not, can you give an example of a group project you worked on? What role did you play, what were the outcomes? </label>
                @if ($canEdit)
                    <textarea class="form-control" name="software_projects" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['software_projects']}}</textarea>
                @else
                    <p>{{$previousNotes['software_projects']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Software Development Practices</h3>

                <label class="form-label">What do you know about "Agile Methodology"? Have you ever worked in an Agile project team?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="agile_methodology" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['agile_methodology']}}</textarea>
                @else
                    <p>{{$previousNotes['agile_methodology']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Problem-Solving Skills</h3>

                <label class="form-label">How would you approach debugging a program that is causing an error?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="approach_debugging" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['approach_debugging']}}</textarea>
                @else
                    <p>{{$previousNotes['approach_debugging']}}</p>
                @endif
                
                <label class="form-label">Provide an example of a time when you used a creative or unconventional approach to solve a problem.</label>
                @if ($canEdit)
                    <textarea class="form-control" name="creative_approach" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['creative_approach']}}</textarea>
                @else
                    <p>{{$previousNotes['creative_approach']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Collaboration and Teamwork</h3>

                <label class="form-label">Describe a situation where you had to collaborate with others on a project. What was your contribution?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="collaboration_example" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['collaboration_example']}}</textarea>
                @else
                    <p>{{$previousNotes['collaboration_example']}}</p>
                @endif

                <label class="form-label">How do you handle conflicts or disagreements within a team? </label>
                @if ($canEdit)
                    <textarea class="form-control" name="handle_conflicts" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['handle_conflicts']}}</textarea>
                @else
                    <p>{{$previousNotes['handle_conflicts']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Adaptability and Learning</h3>

                <label class="form-label">Can you tell us about a time when you had to learn a new skill quickly? How was the experience?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="learn_new_skill" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['learn_new_skill']}}</textarea>                
                @else
                    <p>{{$previousNotes['learn_new_skill']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Behavioral</h3>

                <label class="form-label">Describe a project or situation where you took initiative or ownership of a problem. What was the outcome?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="behavioral_ownership" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['behavioral_ownership']}}</textarea>
                @else
                    <p>{{$previousNotes['behavioral_ownership']}}</p>
                @endif

                <label class="form-label">Give an example of how you handled a stressful situation</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="behavioral_stressful" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['behavioral_stressful']}}</textarea>
                @else
                    <p>{{$previousNotes['behavioral_stressful']}}</p>
                @endif

                <label class="form-label">Suppose a client approaches you about an error in their software after deployment that led to loss of revenue. Upon investigating, you realize that the code that the error was written by one of your teammates. How would you respond? What if the error was caused by you?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="behavioral_error" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['behavioral_error']}}</textarea>
                @else
                    <p>{{$previousNotes['behavioral_error']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Professionalism and Ethics</h3>

                <label class="form-label">What would you do if you noticed a teammate was cutting corners with their code that could potentially lead to future issues?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="ethics_cutting_corners" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['ethics_cutting_corners']}}</textarea>
                @else
                    <p>{{$previousNotes['ethics_cutting_corners']}}</p>
                @endif

                <label class="form-label">Suppose you had an assignment due the next day which you had not started. While working on the assignment, you realize it will not be possible to complete it by the deadline. Your friend offers to show you his own completed assignment. What would you do?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="ethics_late_assignment" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['ethics_late_assignment']}}</textarea>
                @else
                    <p>{{$previousNotes['ethics_late_assignment']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Technical Skills Assessment</h3>

                <label class="form-label">Can you write a function to add two numbers and print the result?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="technical_add_two" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['technical_add_two']}}</textarea>
                @else
                    <p>{{$previousNotes['technical_add_two']}}</p>
                @endif

                <label class="form-label">Can you write a function to reverse a string?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="technical_reverse_string" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['technical_reverse_string']}}</textarea>
                @else
                    <p>{{$previousNotes['technical_reverse_string']}}</p>
                @endif
            </div>

            <div class="mb-4">
                <h3>Volunteer Position</h3>

                <label class="form-label">We only have a limited number of paid internship positions available this summer. However, there are also volunteer positions available. If we are unable to offer you a paid internship at this time, would you be willing to accept an unpaid volunteer position?</label>
                @if ($canEdit)
                    <textarea class="form-control mb-3" name="accept_volunteer" id="" cols="30" rows="10" placeholder="Enter response and/or notes">{{$previousNotes['accept_volunteer']}}</textarea>
                @else
                    <p>{{$previousNotes['accept_volunteer']}}</p>
                @endif
            </div>

            <div class="mb-3">
                <h3>Additional Questions and Comments</h3>
                <label class="form-label">Is there anything else you would like to add that has not been covered? Do you have any questions for us?</label>
                @if ($canEdit)
                    <textarea class="form-control" name="additional_comments" id="" cols="30" rows="10" placeholder="Enter Additional Comments">{{$previousNotes['additional_comments']}}</textarea>
                @else
                    <p>{{$previousNotes['additional_comments']}}</p>
                @endif

                @error('additional_comments')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- <input type="hidden" name="interviewer_id" value="{{$interviewer->name}}"/>
            <input type="hidden" name="application_id" value="{{$application->id}}"/> --}}

        </div>
        <!--end col-->
    </div>
    <!-- end row -->

    <div class="text-end mb-4">
        @if ($canEdit)
            <a href="{{ route('referencecheck.store') }}" onclick="event.preventDefault(); document.getElementById('create-request').submit();" class="btn btn-success h-l w-xl">Save Changes</a>
        @endif
    </div>
</form>