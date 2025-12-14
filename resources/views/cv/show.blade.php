<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CV — {{ $cv->name ?? 'User' }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { font-family: "Inter", sans-serif; background:#f6f8fb; }

    .top-banner {
      background: linear-gradient(160deg,#06345b 0%, #0b4a7a 50%, #0fb0ff 100%);
      color:white; padding:40px 30px; border-radius:10px;
    }
    .profile-photo {
      width:130px; height:130px; border-radius:50%; object-fit:cover;
      border:5px solid white;
    }
    .hero-name { font-size:32px; font-weight:800; }
    .hero-role { font-size:16px; opacity:.95; }
    .left-panel { background:white; padding:25px; border-radius:10px; }
    .card-floor { background:white; padding:25px; border-radius:10px; }
    .blue-pill {
      background: linear-gradient(90deg,#0b4a7a,#0b8fd6);
      padding:7px 18px; border-radius:999px;
      color:white; font-weight:700;
      width: fit-content;
    }
    .timeline { border-left:3px solid #0b6fc2; padding-left:20px; }
    .timeline-item { margin-bottom:12px; }

    /* Area yang akan di-convert ke PDF */
    #cv-content {
        background:#ffffff;
        padding:20px;
        border-radius:10px;
        margin:auto;
    }
  </style>
</head>
<body>

<div class="text-end mb-3">
    <button id="downloadPDF" class="btn btn-primary btn-sm">
        Download PDF
    </button>
</div>


<!-- WRAP ALL CV CONTENT -->
<div id="cv-content">

<div class="container my-4" style="max-width:900px;">

  <div class="top-banner mb-4 d-flex align-items-center gap-3">
    <img class="profile-photo"
     src="{{ $cv->photo_url ? asset($cv->photo_url) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}">

    <div>
      <div class="hero-name">{{ $cv->name ?? 'Nama Lengkap' }}</div>
      <div class="hero-role">{{ $cv->position ?? 'Profesi / Role' }}</div>
      <div class="mt-2">{{ $cv->user->email ?? '-' }}</div>
      <div>{{ $cv->phone ?? '-' }}</div>
    </div>
  </div>

  <div class="row g-4">

    <div class="col-md-4">
      <div class="left-panel shadow-sm">

        <h6 class="text-center fw-bold text-primary">CONTACT</h6>
        <p>{{ $cv->user->email ?? '-' }}</p>
        <p>{{ $cv->phone ?? '-' }}</p>

        <h6 class="fw-bold text-primary mt-4">SKILLS</h6>
        <ul class="list-unstyled">
          @if(!empty($cv->skills))
            @foreach($cv->skills as $skill)
              <li>{{ $skill }}</li>
            @endforeach
          @else
            <li>-</li>
          @endif
        </ul>

        <h6 class="fw-bold text-primary mt-4">HOBBIES</h6>
        <div>{{ $cv->hobbies ?? '-' }}</div>

      </div>
    </div>

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

</div> <!-- END WRAPPER -->


<!-- html2canvas + jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
document.getElementById('downloadPDF').addEventListener('click', async () => {
    const { jsPDF } = window.jspdf;
    const element = document.getElementById('cv-content');

    // Paksa width A4 (794px)
    const originalWidth = element.style.width;
    element.style.width = "794px";

    window.scrollTo(0, 0);  // penting biar canvas tidak terpotong

    const canvas = await html2canvas(element, {
        scale: 2,
        useCORS: true,
        scrollY: -window.scrollY // anti BUG cropping HTML2Canvas
    });

    element.style.width = originalWidth;

    const pdf = new jsPDF({
        unit: 'mm',
        format: 'a4',
        orientation: 'portrait'
    });

    const canvasWidth = canvas.width;
    const canvasHeight = canvas.height;

    const pageWidth = pdf.internal.pageSize.getWidth();
    const pageHeight = pdf.internal.pageSize.getHeight();

    const mmPerPx = pageWidth / canvasWidth;
    const imgHeightMM = canvasHeight * mmPerPx;

    const totalPages = Math.ceil(imgHeightMM / pageHeight);

    // PAGE CANVAS
    const pageCanvas = document.createElement('canvas');
    const pageCtx = pageCanvas.getContext('2d');

    const pxPerPage = Math.floor(pageHeight / mmPerPx);

    pageCanvas.width = canvasWidth;
    pageCanvas.height = pxPerPage;

    for (let page = 0; page < totalPages; page++) {
        const sy = page * pxPerPage;

        const remainingPx = canvasHeight - sy;
        const sliceHeight = Math.min(pxPerPage, remainingPx);

        // Resize canvas sesuai slice height (fix area hitam)
        pageCanvas.height = sliceHeight;

        pageCtx.clearRect(0, 0, canvasWidth, sliceHeight);

        pageCtx.drawImage(
            canvas,
            0, sy, canvasWidth, sliceHeight,
            0, 0, canvasWidth, sliceHeight
        );

        const imgData = pageCanvas.toDataURL('image/jpeg', 1.0);

        const sliceHeightMM = sliceHeight * mmPerPx;

        if (page > 0) pdf.addPage();
        pdf.addImage(imgData, 'JPEG', 0, 0, pageWidth, sliceHeightMM);
    }

    pdf.save("CV-{{ $cv->name ?? 'User' }}.pdf");
});
</script>

</body>
</html>
