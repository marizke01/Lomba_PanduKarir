<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>
@page {
    size: A4 landscape;
    margin: 18mm; /* ⬅️ TAMBAH SEDIKIT */
}

body {
    margin: 0;
    padding: 0;
    font-family: DejaVu Sans, sans-serif;
    background: #ffffff;
}

/* FRAME */
.frame {
    width: calc(100% - 6mm); /* ⬅️ KUNCI TERAKHIR */
    margin: 0 auto;
    margin-left: -7mm;
    border: 4px solid #4f46e5;
    padding: 9mm;
}


.inner {
    border: 2px solid #c7d2fe;
    padding: 10mm;
    text-align: center;
}

.subtitle {
    font-size: 11px;
    letter-spacing: 3px;
    margin-bottom: 10px;
}

h1 {
    font-size: 30px;
    letter-spacing: 4px;
    margin: 5px 0;
}

.name {
    font-size: 26px;
    font-weight: bold;
    color: #4f46e5;
    margin: 18px 0;
}

.desc {
    font-size: 14px;
    width: 70%;
    margin: 0 auto;
    line-height: 1.6;
}

.divider {
    width: 120px;
    height: 3px;
    background: #4f46e5;
    margin: 30px auto;
}

.footer {
    margin-top: 28px;
    font-size: 12px;
}

.footer table {
    width: 100%;
}
</style>

</head>

<body>

<table width="100%" height="100%" cellspacing="0" cellpadding="0">
<tr>
<td align="center" valign="middle">

    <div class="frame">
        <div class="inner">

            <div class="subtitle">SKILLBRIDGE CERTIFICATION</div>

            <h1>CERTIFICATE</h1>
            <div class="subtitle">OF COMPLETION</div>

            <p>This certificate is proudly presented to</p>

            <div class="name">{{ $certificate->user->name }}</div>

            <p class="desc">
                Telah berhasil menyelesaikan project
                <strong>{{ $certificate->project_title }}</strong>
                sebagai bagian dari program Project Lab SkillBridge.
            </p>

            <div class="divider"></div>

            <div class="footer">
                <table>
                    <tr>
                        <td align="left">
                            <strong>Issued Date</strong><br>
                            {{ $certificate->issued_at->format('d F Y') }}
                        </td>
                        <td align="right">
                            <strong>Authorized By</strong><br>
                            SkillBridge Platform
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

</td>
</tr>
</table>

</body>
</html>
