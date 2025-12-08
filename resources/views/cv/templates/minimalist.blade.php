<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Minimalis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-yellow { background-color: #FFC107; color: #000; }
        .bg-black { background-color: #000; color: #FFC107; }
        @page { size: A4; margin: 1cm; }
        @media print {
            body { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <header class="text-center p-4 bg-black">
            @if(!empty($photo))
            <img src="{{ $photo }}" alt="Profile Photo" class="rounded-circle mb-3" style="width: 120px; border: 3px solid #FFC107;">
            @endif
            <h1 class="text-warning">{{ $name }}</h1>
        </header>
        <section class="p-3 bg-yellow">
            <h2>Kontak</h2>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Telepon:</strong> {{ $phone }}</p>
        </section>
        <section class="p-3 bg-black">
            <h2>Keahlian</h2>
            <ul class="list-unstyled">
                @foreach($skills as $skill)
                <li>{{ $skill }}</li>
                @endforeach
            </ul>
        </section>
        <section class="p-3 bg-yellow">
            <h2>Profil</h2>
            <p>{{ $profile }}</p>
        </section>
        <section class="p-3 bg-black">
            <h2>Pendidikan</h2>
            @foreach($education as $edu)
            <p>{{ $edu }}</p>
            @endforeach
        </section>
        <section class="p-3 bg-yellow">
            <h2>Pengalaman Kerja</h2>
            @foreach($experience as $exp)
            <p>{{ $exp }}</p>
            @endforeach
        </section>
    </div>
</body>
</html>
