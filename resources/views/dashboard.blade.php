@extends('usernav')
@section('main')

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
                <a href="{{ url('Company') }}">
                    <div class="box-topic"> Register Company</div>
                </a>
                <div class="number">{{ $cCount }}</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Total Register Company</span>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="right-side">
                <a href="{{ url('applicant') }}">
                    <div class="box-topic">New Applicants</div>
                </a>
                <div class="number">{{ $ncan }}</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">New Aplicants</span>
                </div>
            </div>

        </div>

        <div class="box">
            <div class="left-side">
                <a href="{{ url('applicant') }}">
                    <div class="box-topic">Total Applicants</div>
                </a>
                <div class="number">{{ $tapplicants }}</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Total Applicants</span>
                </div>
            </div>

        </div>
        <div class="box">
            <div class="right-side">
                <a
                    href="{{ url('srApplicants',['id' => 'selected']) }}">
                    <div class="box-topic">Selected Applicants</div>
                </a>
                <div class="number">{{ $scan }}</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Total Selected Applicants</span>
                </div>
            </div>

        </div>
        <div class="box">
            <div class="right-side">
                <a
                    href="{{ url('srApplicants',['id' => 'Rejected']) }}">
                    <div class="box-topic">Rejectd Applicants</div>
                </a>
                <div class="number">{{ $rcan }}</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Tottal Rejectd Applicants</span>
                </div>
            </div>

        </div>


        <div class="box">
            <div class="right-side">
                <div class="box-topic">Most Applied Job</div>
                @foreach($vacan as $can)
                    <div class="number">{{ $can[0]->post }}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Most Applied Job</span>
                    </div>
            </div>

        </div>
        @endforeach
        @foreach($vacan as $cap)
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Most Job Applied Company</div>
                    <div class="number">{{ $cap[0]->company }}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Most Job Applied Company</span>
                    </div>
                </div>

            </div>
        @endforeach
        @foreach($vacan as $set)
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Most Job Applied Sector</div>
                    <div class="number">{{ $set[0]->category }}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Mos Job Applied Sector</span>
                    </div>
                </div>

            </div>
        @endforeach
        @foreach($vljob as $set)
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Less Applied Job</div>
                    <div class="number">{{ $set[0]->post }}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Les Applied Job</span>
                    </div>
                </div>

            </div>
        @endforeach
        @foreach($vljob as $set)
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Least Job Applied Company</div>
                    <div class="number">{{ $set[0]->company }}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Least Job Applied Company</span>
                    </div>
                </div>

            </div>
        @endforeach
        @foreach($vljob as $set)
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Least Job Applied Sector</div>
                    <div class="number">{{ $set[0]->category }}</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Least Job Applied Sector</span>
                    </div>
                </div>

            </div>
        @endforeach
        @foreach($vljob as $set)
            <div class="box">
                <div class="right-side">
                    <a href="{{ url('sortList') }}">
                        <div class="box-topic">Sort Listed Applicant</div>
                    </a>
                    <div class="number">Enter Vacancy & Company</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Sort Listed Candiadte</span>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    </section>

    @endsection
