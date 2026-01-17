<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>CV — {{ auth()->user()->name }}</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
    font-family: "Inter", sans-serif;
    background: #ffffff;
    margin: 0;
    padding: 0;
}


#cv-content {
    background: #ffffff;
    width: 100%;
}


.top-banner {
    background: linear-gradient(160deg,#06345b 0%, #0b4a7a 50%, #0fb0ff 100%);
    color:white;
    padding:40px 30px;
    border-radius:10px;
}

.profile-photo {
    width:130px;
    height:130px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid white;
}

.hero-name { font-size:32px; font-weight:800; }
.hero-role { font-size:16px; opacity:.95; }

.left-panel,
.card-floor {
    background:white;
    padding:25px;
    border-radius:10px;
}

.blue-pill {
    background: linear-gradient(90deg,#0b4a7a,#0b8fd6);
    padding:7px 18px;
    border-radius:999px;
    color:white;
    font-weight:700;
    width: fit-content;
}

.timeline {
    border-left:3px solid #0b6fc2;
    padding-left:20px;
}
.timeline-item {
    margin-bottom:12px;
}


@media print {
    body {
        background: #ffffff !important;
    }

    .no-print {
        display: none !important;
    }

    #cv-content {
        margin: 0 !important;
        padding: 0 !important;
        background: #ffffff !important;
    }

    .container {
        max-width: 100% !important;
    }
}
</style>
</head>
<body>


<div class="text-end p-3 no-print">
    <a href="{{ route('cv.download') }}" class="btn btn-primary btn-sm">
        Download PDF
    </a>
</div>


<div id="cv-content">
<div class="container my-4" style="max-width:900px;">

   
    <div class="top-banner mb-4 d-flex align-items-center gap-4">

        {{-- FOTO --}}
        @if(!empty($cv->photo_url))
            <img src="{{ asset($cv->photo_url) }}" class="profile-photo">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0b4a7a&color=ffffff"
                 class="profile-photo">
        @endif

        {{-- IDENTITAS --}}
        <div>
            <div class="hero-name">{{ auth()->user()->name }}</div>
            <div class="hero-role">{{ $cv->position ?? 'Profesi / Role' }}</div>
            <div class="mt-2">{{ auth()->user()->email }}</div>
            <div>{{ $cv->phone ?? '-' }}</div>
        </div>
    </div>

    <div class="row g-4">

        <!-- LEFT -->
        <div class="col-md-4">
            <div class="left-panel shadow-sm">

                <h6 class="text-center fw-bold text-primary">CONTACT</h6>
                <p>{{ auth()->user()->email }}</p>
                <p>{{ $cv->phone ?? '-' }}</p>

                <h6 class="fw-bold text-primary mt-4">SKILLS</h6>
                <ul class="list-unstyled">
                    @if(!empty($cv->skills))
                        @foreach($cv->skills as $skill)
                            <li>• {{ $skill }}</li>
                        @endforeach
                    @else
                        <li>-</li>
                    @endif
                </ul>

                <h6 class="fw-bold text-primary mt-4">HOBBIES</h6>
                <div>{{ $cv->hobbies ?? '-' }}</div>

            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-8">
            <div class="card-floor shadow-sm mb-4">

                <div class="blue-pill mb-2">About Me</div>
                <p>{{ $cv->about ?? '-' }}</p>

                <div class="blue-pill mt-4 mb-2">Education</div>
                <div class="timeline">
                    @if(!empty($cv->education))
                        @foreach($cv->education as $edu)
                            <div class="timeline-item">
                                {{ $edu['school'] ?? '' }} –
                                {{ $edu['major'] ?? '' }}
                                ({{ $edu['year'] ?? '' }})
                            </div>
                        @endforeach
                    @else
                        <div class="timeline-item">-</div>
                    @endif
                </div>

                <div class="blue-pill mt-4 mb-2">Experience</div>
                <div class="timeline">
                    @if(!empty($cv->experience))
                        @foreach($cv->experience as $ex)
                            <div class="timeline-item">
                                {{ $ex['title'] ?? '' }} – {{ $ex['year'] ?? '' }}<br>
                                <small class="text-muted">{{ $ex['desc'] ?? '' }}</small>
                            </div>
                        @endforeach
                    @else
                        <div class="timeline-item">-</div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>
</div>

</body>
</html>
