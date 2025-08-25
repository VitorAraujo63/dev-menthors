<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - DevMenthors</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-500">
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-center text-blue-900 mb-6">Login</h1>

    <form>

      <div class="mb-4">
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">E-mail</label>
        <input type="email" id="email" placeholder="Digite seu e-mail"
          class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>


      <div class="mb-6">
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Senha</label>
        <input type="password" id="password" placeholder="Digite sua senha"
          class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>


      <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition">
        Entrar
      </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
      Não tem uma conta?
      <a href="cadastro" class="text-blue-600 font-semibold hover:underline">Cadastre-se</a>
    </p>
  </div>
</body>
</html>
