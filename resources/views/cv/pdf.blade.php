<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CV - {{ $cv->user->name }}</title>

<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    font-size: 13px;
    background: #ffffff;
}


.top-banner {
    background: linear-gradient(90deg, #06345b, #0b72b5, #0fb0ff);
    padding: 28px;
    color: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
}

.photo {
    width: 115px;
    height: 115px;
    border-radius: 60px;
    object-fit: cover;
    border: 4px solid #ffffff;
    margin-right: 22px;
}

.name {
    font-size: 26px;
    font-weight: 800;
}

.role {
    font-size: 14px;
    margin-top: 4px;
}

/* CONTENT */
.wrapper {
    padding: 22px;
}

.section-box {
    background: #ffffff;
    padding: 18px;
    border-radius: 12px;
    margin-bottom: 18px;
}

.section-title {
    font-weight: bold;
    font-size: 14px;
    color: #0b4a7a;
    margin-bottom: 6px;
}

.blue-pill {
    background: #0b72b5;
    color: white;
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 12px;
    display: inline-block;
    margin: 14px 0 8px;
}

.timeline {
    border-left: 3px solid #0b6fc2;
    padding-left: 12px;
}

.timeline-item {
    margin-bottom: 10px;
}

.layout {
    width: 100%;
    border-collapse: collapse;
}

.left {
    width: 32%;
    vertical-align: top;
    padding-right: 14px;
}

.right {
    width: 68%;
    vertical-align: top;
}
</style>
</head>

<body>

{{-- HEADER --}}
<div class="top-banner">

    {{-- FOTO --}}
    @if(!empty($cv->photo_url) && file_exists(public_path($cv->photo_url)))
        <img class="photo" src="{{ public_path($cv->photo_url) }}">
    @endif

    <div>
        <div class="name">{{ $cv->user->name }}</div>
        <div class="role">{{ $cv->position ?? '-' }}</div>
        <div>{{ $cv->user->email }}</div>
        <div>{{ $cv->phone ?? '-' }}</div>
    </div>
</div>

<div class="wrapper">

<table class="layout">
<tr>

    {{-- LEFT --}}
    <td class="left">

        <div class="section-box">
            <div class="section-title">CONTACT</div>
            {{ $cv->user->email }}<br>
            {{ $cv->phone ?? '-' }}
        </div>

        <div class="section-box">
            <div class="section-title">SKILLS</div>
            <ul style="padding-left:18px; margin:0;">
                @forelse($cv->skills ?? [] as $skill)
                    <li>{{ $skill }}</li>
                @empty
                    <li>-</li>
                @endforelse
            </ul>
        </div>

        <div class="section-box">
            <div class="section-title">HOBBIES</div>
            {{ $cv->hobbies ?? '-' }}
        </div>

    </td>

    {{-- RIGHT --}}
    <td class="right">

        <div class="section-box">

            <div class="blue-pill">About Me</div>
            <p>{{ $cv->about ?? '-' }}</p>

            <div class="blue-pill">Education</div>
            <div class="timeline">
                @forelse($cv->education ?? [] as $edu)
                    <div class="timeline-item">
                        <strong>{{ $edu['school'] ?? '-' }}</strong><br>
                        {{ $edu['major'] ?? '-' }} — {{ $edu['year'] ?? '-' }}
                    </div>
                @empty
                    <div class="timeline-item">-</div>
                @endforelse
            </div>

            <div class="blue-pill">Experience</div>
            <div class="timeline">
                @forelse($cv->experience ?? [] as $ex)
                    <div class="timeline-item">
                        <strong>{{ $ex['title'] ?? '-' }}</strong>
                        ({{ $ex['year'] ?? '-' }})<br>
                        <small>{{ $ex['desc'] ?? '-' }}</small>
                    </div>
                @empty
                    <div class="timeline-item">-</div>
                @endforelse
            </div>

        </div>

    </td>

</tr>
</table>

</div>

</body>
</html>
