@extends('layouts.plain')

@section('content')
<div class="container my-4">

    <h2 class="mb-4 text-center">Buat CV – Template:
        <strong>{{ ucfirst($template) }}</strong>
    </h2>

    <div class="row">

        <!-- ================= FORM ================= -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <!-- FORM TIDAK LAGI DIGUNAKAN UNTUK PDF -->
                    <form>

                        <!-- NAME -->
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control live"
                                   data-target="preview-name">
                        </div>

                        <!-- ROLE -->
                        <div class="mb-3">
                            <label class="form-label">Profesi / Role</label>
                            <input type="text" class="form-control live"
                                   data-target="preview-role">
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control live"
                                   data-target="preview-email-top, preview-email-left">
                        </div>

                        <!-- PHONE -->
                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" class="form-control live"
                                   data-target="preview-phone-top, preview-phone-left">
                        </div>

                        <!-- PHOTO -->
                        <div class="mb-3">
                            <label class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="photoInput">
                        </div>

                        <!-- ABOUT -->
                        <div class="mb-3">
                            <label class="form-label">Profil Singkat</label>
                            <textarea class="form-control live"
                                      data-target="preview-about"></textarea>
                        </div>

                        <!-- SKILLS -->
                        <div class="mb-3">
                            <label class="form-label">Keahlian (pisahkan dengan koma)</label>
                            <input type="text" class="form-control live-list"
                                   data-target="preview-skills">
                        </div>

                        <!-- EDUCATION -->
                        <div class="mb-3">
                            <label class="form-label">Pendidikan</label>
                            <textarea class="form-control live-list"
                                      data-target="preview-education"></textarea>
                        </div>

                        <!-- EXPERIENCE -->
                        <div class="mb-3">
                            <label class="form-label">Pengalaman Kerja</label>
                            <textarea class="form-control live-list"
                                      data-target="preview-experience"></textarea>
                        </div>

                        <!-- HOBBIES -->
                        <div class="mb-3">
                            <label class="form-label">Hobi</label>
                            <input type="text" class="form-control live"
                                   data-target="preview-hobbies">
                        </div>

                        <!-- BUTTON JS -->
                        <button type="button" id="download-btn"
                                class="btn btn-primary w-100">
                            Download PDF
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <!-- ================= PREVIEW ================= -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">

                    <!-- AREA YANG DIJADIKAN PDF -->
                    <div id="cv-preview-area" style="background:white; padding:20px;">
                        {!! view("cv.templates.$template")->render() !!}
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>

<!-- HTML2PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
/* ---------- TEXT INPUT MULTI TARGET ---------- */
document.querySelectorAll(".live").forEach(i => {
    i.addEventListener("input", function () {
        this.dataset.target.split(",").forEach(id => {
            const el = document.getElementById(id.trim());
            if (el) el.innerText = this.value;
        });
    });
});

/* ---------- LIST INPUT: SKILLS / EDU / EXP ---------- */
document.querySelectorAll(".live-list").forEach(i => {
    i.addEventListener("input", function () {
        const target = document.getElementById(this.dataset.target);
        if (!target) return;

        const rows = this.value.split(/\n|,/)
            .map(r => r.trim()).filter(Boolean);

        target.innerHTML = rows.map(r => {
            if (this.dataset.target === "preview-skills")
                return `<li>${r}</li>`;
            return `<div class="timeline-item">${r}</div>`;
        }).join("");
    });
});

/* ---------- PHOTO PREVIEW ---------- */
document.getElementById("photoInput").addEventListener("change", e => {
    let reader = new FileReader();
    reader.onload = () =>
        document.getElementById("preview-photo-img").src = reader.result;
    reader.readAsDataURL(e.target.files[0]);
});

/* ---------- DOWNLOAD PDF ---------- */
document.getElementById("download-btn").addEventListener("click", function () {
    const element = document.getElementById("cv-preview-area");

    html2pdf()
        .from(element)
        .set({
            margin: 0,
            filename: "cv.pdf",
            html2canvas: { scale: 3 },
            jsPDF: { unit: "mm", format: "a4", orientation: "portrait" }
        })
        .save();
});
</script>

@endsection
