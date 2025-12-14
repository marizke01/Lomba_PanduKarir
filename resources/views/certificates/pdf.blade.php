<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat SkillBridge</title>

    <style>
        * {
            box-sizing: border-box;
        }

        @page {
            size: A4 landscape;
            margin: 12mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }

        .certificate {
            width: 100%;
            min-height: 100%;
            border: 5px solid #4f46e5;
            padding: 12mm;
        }

        .inner {
            width: 100%;
            min-height: 100%;
            border: 2px solid #c7d2fe;
            padding: 10mm;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            letter-spacing: 4px;
            margin: 5px 0;
        }

        .subtitle {
            font-size: 11px;
            letter-spacing: 3px;
            margin: 5px 0 20px;
        }

        .name {
            font-size: 26px;
            font-weight: bold;
            color: #4f46e5;
            margin: 16px 0;
        }

        .desc {
            font-size: 14px;
            width: 75%;
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
            margin-top: 35px;
            font-size: 12px;
        }

        .footer table {
            width: 100%;
        }

        .footer td {
            vertical-align: top;
        }
    </style>
</head>
<body>

<div class="certificate">
    <div class="inner">

        <div class="subtitle">SKILLBRIDGE CERTIFICATION</div>

        <h1>CERTIFICATE</h1>
        <div class="subtitle">OF COMPLETION</div>

        <p>This certificate is proudly presented to</p>

        <div class="name">
            {{ $certificate->user->name }}
        </div>

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

</body>
</html>
