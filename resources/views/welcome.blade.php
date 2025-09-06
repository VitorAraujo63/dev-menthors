<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevMentors - Transformando o futuro uma geração por vez</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{!! asset('logo.svg')!!}" type="image/x-icon">

    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-dark: #1d4ed8;
            --accent-purple: #8b5cf6;
            --neutral-50: #f8fafc;
            --neutral-100: #f1f5f9;
            --neutral-600: #475569;
            --neutral-700: #334155;
            --neutral-900: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--neutral-50);
            color: var(--neutral-700);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 3rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            text-decoration: none;
            gap: 20px
        }

        .logo img {
            width: 75px
        }

        .nav-buttons {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .btn {
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            text-decoration: none;
        }

        .btn-entrar {
            background: none;
            color: var(--neutral-700);
            font-weight: 500;
        }

        .btn-entrar:hover {
            background: var(--neutral-100);
            color: var(--primary-blue);
        }

        .btn-hackathon {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-hackathon:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6rem 2rem 2rem;
            background: linear-gradient(135deg, var(--neutral-50) 0%, #e0e7ff 50%, var(--neutral-50) 100%);
            text-align: center;
        }

        .hero-content {
            max-width: 900px;
            animation: fadeInUp 1s ease-out;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--neutral-900);
            margin-bottom: 2rem;
            line-height: 1.1;
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--neutral-600);
            margin-bottom: 3rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            padding: 1.25rem 3rem;
            border-radius: 12px;
            font-size: 1.125rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(37, 99, 235, 0.4);
        }

        .footer {
            background: var(--neutral-900);
            color: white;
            padding: 3rem 2rem 2rem;
            text-align: center;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .footer p {
            opacity: 0.8;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .header { padding: 1rem 1.5rem; }
            .hero-title { font-size: 2.5rem; }
            .hero-subtitle { font-size: 1.125rem; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="{!! asset('logo.svg')!!}" alt="">
            DevMentors
        </div>
        <nav class="nav-buttons">
            <a href="{{ route('mentores.dashboard') }}" class="btn btn-entrar">Entrar</a>
            <button class="btn btn-hackathon">Hackathon</button>
        </nav>
    </header>

    <main class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                DevMentors, <span class="highlight">transformando</span> o <span class="highlight">futuro</span><br>
                uma <span class="highlight">geração</span> por vez.
            </h1>

            <p class="hero-subtitle">
                Vá além do código! Junte-se a nós e aprenda gratuitamente sobre programação, hard e
                soft skills, e empreendedorismo com o apoio de mentores que entendem sua jornada.
            </p>

            <button class="btn cta-button">
                Quero Aprender
            </button>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-logo">DevMentors</div>
        <p>Transformando o futuro através da educação e mentoria em tecnologia.</p>
        <p style="margin-top: 2rem; opacity: 0.6;">&copy; 2025 DevMentors. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
