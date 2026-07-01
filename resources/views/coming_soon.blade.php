<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            margin:0;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            overflow:hidden;
            background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            position:relative;
        }

        /* Background Circle */
        body::before,
        body::after{
            content:"";
            position:absolute;
            border-radius:50%;
            filter:blur(40px);
            opacity:.4;
        }

        body::before{
            width:350px;
            height:350px;
            background:#00d4ff;
            top:-120px;
            left:-120px;
        }

        body::after{
            width:300px;
            height:300px;
            background:#6f42c1;
            bottom:-100px;
            right:-80px;
        }

        .coming-box{
            position:relative;
            z-index:2;
            width:90%;
            max-width:700px;
            padding:60px 40px;
            border-radius:25px;
            background:rgba(255,255,255,.08);
            backdrop-filter:blur(12px);
            border:1px solid rgba(255,255,255,.2);
            box-shadow:0 25px 60px rgba(0,0,0,.35);
            text-align:center;
            color:#fff;
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

        .icon-box{
            width:120px;
            height:120px;
            margin:auto;
            border-radius:50%;
            background:linear-gradient(135deg,#17a2b8,#007bff);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:55px;
            margin-bottom:30px;
            box-shadow:0 10px 30px rgba(0,123,255,.5);
        }

        h1{
            font-weight:700;
            font-size:3rem;
            margin-bottom:15px;
        }

        p{
            font-size:18px;
            color:rgba(255,255,255,.8);
            margin-bottom:35px;
        }

        .countdown{
            display:flex;
            justify-content:center;
            gap:20px;
            margin-bottom:35px;
            flex-wrap:wrap;
        }

        .time-box{
            width:95px;
            padding:15px;
            border-radius:15px;
            background:rgba(255,255,255,.1);
            border:1px solid rgba(255,255,255,.15);
        }

        .time-box h2{
            margin:0;
            font-size:32px;
            font-weight:700;
        }

        .time-box span{
            font-size:13px;
            text-transform:uppercase;
            color:#ddd;
        }

        .btn-home{
            padding:12px 35px;
            border-radius:50px;
            font-weight:600;
            transition:.3s;
        }

        .btn-home:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 25px rgba(255,255,255,.25);
        }

        @media(max-width:576px){

            h1{
                font-size:2.2rem;
            }

            p{
                font-size:16px;
            }

            .coming-box{
                padding:40px 25px;
            }

            .time-box{
                width:80px;
            }

            .time-box h2{
                font-size:24px;
            }

        }

    </style>
</head>
<body>

<div class="coming-box">

    <div class="icon-box">
        <i class="fas fa-tools"></i>
    </div>

    <h1>Coming Soon</h1>

    <p>
        Halaman ini sedang dalam proses pengembangan.
        Kami sedang menyiapkan sesuatu yang lebih baik untuk Anda.
    </p>

    <div class="countdown">

        <div class="time-box">
            <h2 id="days">00</h2>
            <span>Hari</span>
        </div>

        <div class="time-box">
            <h2 id="hours">00</h2>
            <span>Jam</span>
        </div>

        <div class="time-box">
            <h2 id="minutes">00</h2>
            <span>Menit</span>
        </div>

        <div class="time-box">
            <h2 id="seconds">00</h2>
            <span>Detik</span>
        </div>

    </div>

    <a href="/" class="btn btn-light btn-home">
        <i class="fas fa-home mr-2"></i>
        Kembali ke Beranda
    </a>

</div>

<script>

const targetDate = new Date("December 31, 2026 23:59:59").getTime();

setInterval(function(){

    const now = new Date().getTime();
    const distance = targetDate - now;

    const days = Math.floor(distance/(1000*60*60*24));
    const hours = Math.floor((distance%(1000*60*60*24))/(1000*60*60));
    const minutes = Math.floor((distance%(1000*60*60))/(1000*60));
    const seconds = Math.floor((distance%(1000*60))/1000);

    document.getElementById("days").innerHTML = String(days).padStart(2,'0');
    document.getElementById("hours").innerHTML = String(hours).padStart(2,'0');
    document.getElementById("minutes").innerHTML = String(minutes).padStart(2,'0');
    document.getElementById("seconds").innerHTML = String(seconds).padStart(2,'0');

},1000);

</script>

</body>
</html>