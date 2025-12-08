<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Professional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page { size: A4; margin: 1cm; }
        @media print {
            body { -webkit-print-color-adjust: exact; }
        }
        .sidebar {
            background-color: #0d6efd;
            color: #fff;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 sidebar p-4">
                @if(!empty($photo))
                <img src="{{ $photo }}" alt="Profile Photo" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                @endif
                <h2>{{ $name }}</h2>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Telepon:</strong> {{ $phone }}</p>
                <h3>Keahlian</h3>
                <ul class="list-unstyled">
                    @foreach($skills as $skill)
                    <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8 p-4">
                <h2>Pengalaman Kerja</h2>
                @foreach($experience as $exp)
                <p>{{ $exp }}</p>
                @endforeach
                <h2>Pendidikan</h2>
                @foreach($education as $edu)
                <p>{{ $edu }}</p>
                @endforeach
                <h2>Referensi</h2>
                @foreach($references as $ref)
                <p>{{ $ref }}</p>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
