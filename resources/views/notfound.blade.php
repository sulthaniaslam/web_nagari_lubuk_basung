<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            overflow:hidden;
            position:relative;
        }

        body::before{
            content:"";
            position:absolute;
            width:380px;
            height:380px;
            background:#17a2b8;
            border-radius:50%;
            filter:blur(80px);
            opacity:.35;
            top:-150px;
            left:-120px;
        }

        body::after{
            content:"";
            position:absolute;
            width:320px;
            height:320px;
            background:#6f42c1;
            border-radius:50%;
            filter:blur(80px);
            opacity:.35;
            bottom:-120px;
            right:-120px;
        }

        .error-card{

            position:relative;
            z-index:10;
            width:90%;
            max-width:760px;
            padding:60px 45px;
            text-align:center;

            background:rgba(255,255,255,.08);
            backdrop-filter:blur(15px);

            border:1px solid rgba(255,255,255,.18);
            border-radius:25px;

            box-shadow:0 20px 50px rgba(0,0,0,.35);

            animation:float 5s ease-in-out infinite;

        }

        @keyframes float{

            0%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-10px);
            }

            100%{
                transform:translateY(0px);
            }

        }

        .error-number{

            font-size:120px;
            font-weight:700;
            color:#fff;
            line-height:1;
            text-shadow:0 10px 30px rgba(0,0,0,.3);

        }

        .icon-circle{

            width:120px;
            height:120px;

            margin:25px auto;

            border-radius:50%;

            background:linear-gradient(135deg,#ffc107,#ff5722);

            display:flex;
            justify-content:center;
            align-items:center;

            color:#fff;
            font-size:50px;

            box-shadow:0 15px 35px rgba(255,152,0,.4);

        }

        h2{

            color:#fff;
            font-weight:600;
            margin-bottom:15px;

        }

        p{

            color:rgba(255,255,255,.8);
            font-size:17px;
            margin-bottom:35px;

        }

        .btn-custom{

            border-radius:50px;
            padding:12px 30px;
            font-weight:600;
            transition:.3s;

        }

        .btn-custom:hover{

            transform:translateY(-3px);
            box-shadow:0 10px 30px rgba(255,255,255,.2);

        }

        .btn-outline-light:hover{

            color:#2c5364;

        }

        @media(max-width:768px){

            .error-number{

                font-size:90px;

            }

            .error-card{

                padding:40px 25px;

            }

        }

        @media(max-width:576px){

            .error-number{

                font-size:70px;

            }

            h2{

                font-size:28px;

            }

            p{

                font-size:15px;

            }

            .btn-custom{

                width:100%;
                margin-bottom:10px;

            }

        }

    </style>

</head>
<body>

<div class="error-card">

    <div class="error-number">
        404
    </div>

    <div class="icon-circle">
        <i class="fas fa-map-signs"></i>
    </div>

    <h2>Oops! Halaman Tidak Ditemukan</h2>

    <p>
        Halaman yang Anda cari mungkin telah dipindahkan,
        dihapus, atau URL yang dimasukkan tidak benar.
    </p>

    <div class="mt-4">

        <a href="/" class="btn btn-light btn-custom mr-2">
            <i class="fas fa-home mr-2"></i>
            Beranda
        </a>

        <button onclick="history.back()" class="btn btn-outline-light btn-custom">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </button>

    </div>

</div>

</body>
</html>