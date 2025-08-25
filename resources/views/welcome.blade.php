<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DevMentors</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Montserrat", sans-serif;
    }

    body {
      color: #1f2d3d;
      background: #fff;
      line-height: 1.6;
    }

    header {
      width: 100%;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      padding: 15px 8%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header nav a {
      margin: 0 15px;
      text-decoration: none;
      font-weight: 500;
      color: #1f2d3d;
      transition: 0.3s;
    }
    header nav a:hover {
      color: #007bff;
    }

    header .btn-login {
      padding: 8px 20px;
      border-radius: 25px;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      font-weight: 600;
    }

    section {
      padding: 80px 8%;
    }

    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      min-height: 100vh;
      background: linear-gradient(135deg, #007bff, #00c6ff);
      color: #fff;
      padding-top: 120px;
    }

    .hero-text {
      max-width: 50%;
    }
    .hero-text h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      font-weight: 700;
    }
    .hero-text p {
      font-size: 1.1rem;
      margin-bottom: 30px;
    }
    .hero-text .btn-primary {
      background: #fff;
      color: #007bff;
      padding: 12px 30px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
    }
    .card {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card h3 {
      margin-bottom: 15px;
      color: #007bff;
    }

    .section-title {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 50px;
      font-weight: 700;
    }

    .faq-item {
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
    }
    .faq-item button {
      width: 100%;
      background: #f7f9fc;
      border: none;
      outline: none;
      padding: 15px;
      font-size: 1rem;
      font-weight: 600;
      text-align: left;
      cursor: pointer;
    }
    .faq-item .answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease, padding 0.3s ease;
      background: #fff;
      padding: 0 15px;
    }
    .faq-item.active .answer {
      max-height: 200px;
      padding: 15px;
    }

    footer {
      background: #1f2d3d;
      color: #fff;
      padding: 40px 8%;
      text-align: center;
    }

    @media (max-width: 900px) {
      .hero {
        flex-direction: column;
        text-align: center;
      }
      .hero-text {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="logo"><h2>DevMentors</h2></div>
    <nav>
      <a href="#trilhas">Trilhas</a>
      <a href="#mentores">Mentores</a>
      <a href="#planos">Planos</a>
      <a href="#faq">FAQ</a>
    </nav>
    <a href="login" class="btn-login">Login</a>
  </header>

  <section class="hero">
    <div class="hero-text">
      <h1>Aprenda com quem já está no mercado</h1>
      <p>Mentorias práticas em PHP, JavaScript e Banco de Dados para acelerar sua carreira de desenvolvedor.</p>
      <a href="#trilhas" class="btn-primary">Começar agora</a>
    </div>
    <div class="hero-img">
      <img src="https://via.placeholder.com/400x300" alt="Ilustração">
    </div>
  </section>

  <section id="trilhas">
    <h2 class="section-title">Nossas Trilhas</h2>
    <div class="cards">
      <div class="card">
        <h3>PHP</h3>
        <p>Aprenda do básico ao avançado com projetos reais.</p>
      </div>
      <div class="card">
        <h3>JavaScript</h3>
        <p>Domine o front-end e back-end com JS moderno.</p>
      </div>
      <div class="card">
        <h3>Banco de Dados</h3>
        <p>Entenda SQL e NoSQL para aplicações robustas.</p>
      </div>
    </div>
  </section>

  <section id="mentores">
    <h2 class="section-title">Mentores</h2>
    <div class="cards">
      <div class="card">
        <h3>João Silva</h3>
        <p>Desenvolvedor PHP com 10 anos de experiência.</p>
      </div>
      <div class="card">
        <h3>Maria Souza</h3>
        <p>Especialista em JavaScript e aplicações modernas.</p>
      </div>
      <div class="card">
        <h3>Carlos Pereira</h3>
        <p>DBA e engenheiro de dados apaixonado por ensinar.</p>
      </div>
    </div>
  </section>

  <section id="planos">
    <h2 class="section-title">Planos</h2>
    <div class="cards">
      <div class="card">
        <h3>Básico</h3>
        <p>Acesso a uma trilha de aprendizado.</p>
      </div>
      <div class="card">
        <h3>Intermediário</h3>
        <p>Acesso a todas as trilhas + suporte via chat.</p>
      </div>
      <div class="card">
        <h3>Premium</h3>
        <p>Todas as trilhas + mentor exclusivo e projetos guiados.</p>
      </div>
    </div>
  </section>

  <section id="faq">
    <h2 class="section-title">FAQ</h2>
    <div class="faq-item">
      <button>Como funciona a mentoria?</button>
      <div class="answer"><p>A mentoria funciona de forma online, com encontros semanais e suporte assíncrono.</p></div>
    </div>
    <div class="faq-item">
      <button>Posso cancelar quando quiser?</button>
      <div class="answer"><p>Sim, o cancelamento pode ser feito a qualquer momento sem multas.</p></div>
    </div>
    <div class="faq-item">
      <button>Recebo certificado?</button>
      <div class="answer"><p>Sim, após completar cada trilha você recebe um certificado válido.</p></div>
    </div>
  </section>

  <footer>
    <p>© 2025 DevMentors - Todos os direitos reservados.</p>
  </footer>

  <script>
    const faqItems = document.querySelectorAll('.faq-item button');
    faqItems.forEach(btn => {
      btn.addEventListener('click', () => {
        btn.parentElement.classList.toggle('active');
      });
    });
  </script>
</body>
</html>
