<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CV - {{ $cv->user->name }}</title>

    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            font-size: 13px;
            background: #f0f4f8;
        }

        /* Banner header mirip show.blade */
        .top-banner {
            background: linear-gradient(90deg, #06345b, #0b72b5, #0fb0ff);
            padding: 30px;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
        }

        .photo {
            width: 120px;
            height: 120px;
            border-radius: 60px;
            object-fit: cover;
            border: 5px solid white;
            margin-right: 25px;
        }

        .name {
            font-size: 28px;
            font-weight: 900;
        }

        .role {
            margin-top: 3px;
            font-size: 15px;
        }

        .section-box {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 12px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 15px;
            color: #0b4a7a;
        }

        .blue-pill {
            background: #0b72b5;
            color: white;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 13px;
            display: inline-block;
            margin-top: 15px;
            margin-bottom: 8px;
        }

        .timeline {
            border-left: 3px solid #0b6fc2;
            padding-left: 10px;
        }

        .timeline-item {
            margin-bottom: 10px;
        }

        .layout {
            width: 100%;
            border-collapse: collapse;
        }

        td.left {
            width: 32%;
            vertical-align: top;
            padding-right: 15px;
        }

        td.right {
            width: 68%;
            vertical-align: top;
        }

    </style>
</head>

<body>

<div class="top-banner">
    <img class="photo"
         src="{{ public_path($cv->photo_url) }}"
         onerror="this.style.display='none'">

    <div>
        <div class="name">{{ $cv->user->name }}</div>
        <div class="role">{{ $cv->position }}</div>
        <div>{{ $cv->user->email }}</div>
        <div>{{ $cv->phone }}</div>
    </div>
</div>


<div style="padding: 20px;">

    <table class="layout">
        <tr>

            <!-- LEFT PANEL -->
            <td class="left">

                <div class="section-box">
                    <div class="section-title">CONTACT</div>
                    {{ $cv->user->email }} <br>
                    {{ $cv->phone }}
                </div>

                <div class="section-box">
                    <div class="section-title">SKILLS</div>
                    <ul>
                        @foreach($cv->skills ?? [] as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="section-box">
                    <div class="section-title">HOBBIES</div>
                    {{ $cv->hobbies }}
                </div>

            </td>

            <!-- RIGHT PANEL -->
            <td class="right">

                <div class="section-box">
                    <div class="blue-pill">About Me</div>
                    <p>{{ $cv->about }}</p>

                    <div class="blue-pill">Education</div>
                    <div class="timeline">
                        @foreach($cv->education ?? [] as $edu)
                            <div class="timeline-item">
                                <strong>{{ $edu['school'] }}</strong><br>
                                {{ $edu['major'] }} — {{ $edu['year'] }}
                            </div>
                        @endforeach
                    </div>

                    <div class="blue-pill">Experience</div>
                    <div class="timeline">
                        @foreach($cv->experience ?? [] as $ex)
                            <div class="timeline-item">
                                <strong>{{ $ex['title'] }}</strong> ({{ $ex['year'] }})<br>
                                <small>{{ $ex['desc'] }}</small>
                            </div>
                        @endforeach
                    </div>

                </div>

            </td>

        </tr>
    </table>

</div>

</body>
</html>
