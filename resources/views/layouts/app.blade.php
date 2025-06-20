<!DOCTYPE html>
<html>
<head>
    <title>Rick and Morty App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN para estilos rápidos --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            background-image: url('/images/fondo-rick.png');
            background-repeat: repeat;
            background-size: 27%; /* Ajusta según el tamaño de ícono */
            background-attachment: fixed;
            opacity: 0.97;
        }

        nav[role="navigation"] {
            text-align: center;
            margin-top: 20px;
        }

        nav[role="navigation"] > div > span,
        nav[role="navigation"] > div > a {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
        }

        nav[role="navigation"] > div > span {
            background-color: #eee;
        }

        nav[role="navigation"] svg {
            width: 16px;
            height: 16px;
            vertical-align: middle;
        }

        .btnsContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .btn{
            position: relative;
            font-size: 1rem;
            text-decoration: none;
            color: #2c3e50;
            border: 2px solid rgba(68, 68, 68, 0.79);
            padding: 0rem 1.5rem;
            cursor: pointer
        }

        .api{
            width: 500px;
            height: 30px;
            margin-right: 70px;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            padding: 0rem 1.5rem
        }

        .det, .edi{
            width: 100px;
            height: 28px;
            font-size: 13px;
            padding: 4px 8px
        }

        .can, .gua{
            width: 200px;
            height: 30px;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            padding: 0px 4px 0px 8px
        }

        .btn span{
            position: relative;
            z-index:1;
            padding-bottom: 20px
        }

        .btn:nth-child(1):hover{
            border-color:rgb(0, 161, 0);
            color: rgb(0, 161, 0);
            box-shadow: 0 0 0 rgb(0, 161, 0);
            animation: box 3s infinite
        }
        
        .btn.edi:hover{
            border-color: rgba(218, 205, 35, 0.84);
            color: rgba(218, 205, 35, 0.84);
            box-shadow: 0 0 0 rgba(218, 205, 35, 0.84);
            animation: box 3s infinite;
            background-color: transparent
        }
        
        .btn.can:hover{
            border-color:rgb(212, 0, 0);
            color: rgb(212, 0, 0);
            box-shadow: 0 0 0 rgb(212, 0, 0);
            animation: box 3s infinite;
            background-color: transparent
        }
        
        .btn.det:hover{
            border-color:rgb(0, 70, 175);
            color: rgb(0, 70, 175);
            box-shadow: 0 0 0 rgb(0, 70, 175);
            animation: box 3s infinite;
            background-color: transparent
        }

        @keyframes box{
            0%{
                box-shadow: #27272c
            }
            50%{
                box-shadow: 0 0 27px
            }
            100%{
                box-shadow: #27272c
            }
        }

        .btn::before{
            content: "";
            width: 12px;
            height: 12px;
            /*background-color: rgb(0, 161, 0); /* Temporal */
            position: absolute;
            left: 80%;
            top: -20%;
            transform: translate(0%, 15%);
            transition: left 1s ease
        }  

        .btn::after{
            content: "";
            width: 12px;
            height: 12px;
            /*background-color: rgb(0, 161, 0); /* Temporal */
            position: absolute;
            left: 20%;
            top: 120%;
            transform: translate(0%, -130%);
            transition: left 1s ease
        }  

        .btn:nth-child(1)::before{
            background-color: rgb(0, 161, 0);
            border-radius: 2px
        }

        .btn:nth-child(1)::after{
            background-color: rgb(0, 161, 0);
            border-radius: 2px
        }

        .btn.gua::before{
            content: "";
            width: 12px;
            height: 12px;
            /*background-color: rgb(0, 161, 0); /* Temporal */
            position: absolute;
            left: 80%;
            top: -35%;
            transform: translate(0%, 15%);
            transition: left 1s ease
        }

        .btn.gua::after{
            content: "";
            width: 12px;
            height: 12px;
            /*background-color: rgb(0, 161, 0); /* Temporal */
            position: absolute;
            left: 20%;
            top: 140%;
            transform: translate(0%, -130%);
            transition: left 1s ease
        }

        .btn.edi::before{
            background-color: rgba(218, 205, 35, 0.84);
            border-radius: 50px;
            top: -35%;
            left: 70%
        }

        .btn.edi::after{
            background-color: rgba(218, 205, 35, 0.84);
            border-radius: 50px;
            top: 140%;
            left: 22%
        }

        .btn.can::before{
            width: 0;
            height: 0;
            border-left: 9px solid transparent;
            border-right: 9px solid transparent;
            border-bottom: 18px solid rgb(212, 0, 0);
            top: -52%;
            background-color: transparent
        }

        .btn.can::after{
            width: 0;
            height: 0;
            border-left: 9px solid transparent;
            border-right: 9px solid transparent;
            border-bottom: 18px solid rgb(212, 0, 0);
            top: 158%;
            background-color: transparent
        }

        .btn.det::before{
            background-color: rgb(0, 70, 175);
            border-radius: 1px;
            width: 20px;
            height: 7px;
            top: -20%;
            left: 70%
        }

        .btn.det::after{
            background-color: rgb(0, 70, 175);
            border-radius: 1px;
            width: 20px;
            height: 7px;
            top: 122%
        }

        .btn:hover::before{
            left:85%;
            animation: rotateTop 3s infinite
        }

        .btn:hover::after{
            left: 15%;
            animation: rotateBottom 3s infinite
        }

        @keyframes rotateTop{
            0%{transform: translate(0, 20%) rotate(0deg);}
            25%{transform: translate(0, 20%) rotate(90deg);}
            50%{transform: translate(0, 20%) rotate(180deg);}
            75%{transform: translate(0, 20%) rotate(270deg);}
            100%{transform: translate(0, 20%) rotate(360deg)}
        }

        @keyframes rotateBottom{
            0%{transform: translate(0, -130%) rotate(0deg);}
            25%{transform: translate(0, -130%) rotate(-90deg);}
            50%{transform: translate(0, -130%) rotate(-180deg);}
            75%{transform: translate(0, -130%) rotate(-270deg);}
            100%{transform: translate(0, -130%) rotate(-360deg)}
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('characters.index') }}">    
                <h3 class="text-center" style="font-family: 'Orbitron', sans-serif; color:rgb(255, 255, 255)">
                    🛸 Rick & Morty Characters
                </h3>
            </a>
        </div>

        <div class="text-center api mb-4">
            <div class="btn">
                <span>
                    <a href="{{ route('characters.fetch') }}" style="font-family: 'Orbitron', sans-serif; color: rgb(0, 161, 0); text-decoration: none" title="Actualizar personajes">
                        Actualizar desde API
                    </a>
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>