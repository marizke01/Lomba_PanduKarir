<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modern CV</title>

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
    .blue-pill { background: linear-gradient(90deg,#0b4a7a,#0b8fd6); padding:7px 18px; border-radius:999px; color:white; font-weight:700; }
    .timeline { border-left:3px solid #0b6fc2; padding-left:20px; }
    .timeline-item { margin-bottom:12px; }
  </style>
</head>
<body>

<div class="container my-4" style="max-width:900px;">

  <div class="top-banner mb-4 d-flex align-items-center gap-3">
    <img id="preview-photo-img" class="profile-photo" src="https://via.placeholder.com/150" />
    <div>
      <div class="hero-name" id="preview-name">{{ $name ?? '' }}</div>
      <div class="hero-role" id="preview-role">{{ $role ?? '' }}</div>
      <div class="mt-2" id="preview-email-top">{{ $email ?? '' }}</div>
      <div id="preview-phone-top">{{ $phone ?? '' }}</div>
    </div>
  </div>

  <div class="row g-4">

    <div class="col-md-4">
      <div class="left-panel shadow-sm">

        <h6 class="text-center fw-bold text-primary">CONTACT</h6>
        <p id="preview-email-left">{{ $email ?? '' }}</p>
        <p id="preview-phone-left">{{ $phone ?? '' }}</p>

        <h6 class="fw-bold text-primary mt-4">SKILLS</h6>
       <ul class="list-unstyled" id="preview-skills">
    @php
        $skillsList = is_array($skills ?? null)
            ? $skills
            : (is_string($skills ?? null) ? preg_split('/[\n,]+/', $skills) : []);
        $skillsList = array_filter(array_map('trim', $skillsList));
    @endphp

    @foreach($skillsList as $skill)
        <li>{{ $skill }}</li>
    @endforeach
</ul>


        <h6 class="fw-bold text-primary mt-4">HOBBIES</h6>
        <div id="preview-hobbies">{{ $hobbies ?? '' }}</div>

      </div>
    </div>

    <div class="col-md-8">

      <div class="card-floor shadow-sm mb-4">
        <div class="blue-pill mb-2">About Me</div>
        <p id="preview-about">{{ $profile ?? '' }}</p>

        <div class="blue-pill mt-4 mb-2">Education</div>
        <div class="timeline" id="preview-education">
    @php
        $eduList = is_array($education ?? null)
            ? $education
            : (is_string($education ?? null)
                ? preg_split('/[\n,]+/', $education)
                : []);
        $eduList = array_filter(array_map('trim', $eduList));
    @endphp

    @foreach($eduList as $edu)
        <div class="timeline-item">{{ $edu }}</div>
    @endforeach
</div>


        <div class="blue-pill mt-4 mb-2">Experience</div>
<div class="timeline" id="preview-experience">
    @php
        $expList = is_array($experience ?? null)
            ? $experience
            : (is_string($experience ?? null)
                ? preg_split('/[\n,]+/', $experience)
                : []);
        $expList = array_filter(array_map('trim', $expList));
    @endphp

    @foreach($expList as $exp)
        <div class="timeline-item">{{ $exp }}</div>
    @endforeach
</div>

      </div>

    </div>
  </div>
</div>

<script>
// ===============================
// SYNC INPUT .live KE PREVIEW + VALUE
// ===============================
document.querySelectorAll(".live").forEach(i => {
    i.addEventListener("input", function () {
        let ids = this.dataset.target.split(",");
        ids.forEach(id => {
            let el = document.getElementById(id.trim());
            if (el) el.innerText = this.value;
        });

        // Penting → agar terkirim ke Laravel waktu generate PDF
        this.setAttribute("value", this.value);
    });
});

// ===============================
// SYNC INPUT LIST (skills, edu, exp) → PREVIEW + VALUE
// ===============================
document.querySelectorAll(".live-list").forEach(i => {
    i.addEventListener("input", function () {
        let target = document.getElementById(this.dataset.target);
        if (!target) return;

        let rows = this.value
            .split(/\n|,/)
            .map(r => r.trim())
            .filter(r => r !== "");

        if (this.dataset.target === "preview-skills") {
            target.innerHTML = rows
                .map(r => `<li>${r}</li>`)
                .join("");
        } else {
            target.innerHTML = rows
                .map(r => `<div class="timeline-item">${r}</div>`)
                .join("");
        }

        // agar daftar terkirim ke controller
        this.setAttribute("value", this.value);
    });
});

// ===============================
// PREVIEW FOTO
// ===============================
document.getElementById("photo")?.addEventListener("change", function (evt) {
    const file = evt.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById("preview-photo-img").src = e.target.result;
    };
    reader.readAsDataURL(file);
});
</script>


</body>
</html>
