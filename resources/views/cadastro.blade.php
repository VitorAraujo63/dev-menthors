<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - DevMenthors</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-blue-200 font-montserrat">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
    
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">Criar Conta</h1>
      <p class="text-gray-500 text-sm">Junte-se ao DevMenthors e inicie sua jornada</p>
    </div>

    <form action="#" method="POST" class="space-y-5">

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nome completo</label>
        <input type="text" id="name" name="name" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>


      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" id="email" name="email" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>


      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
        <input type="password" id="password" name="password" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>


      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar senha</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
          class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
      </div>


      <button type="submit"
        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
        Criar Conta
      </button>
    </form>


    <p class="mt-6 text-center text-sm text-gray-600">
      Já tem uma conta?
      <a href="login" class="text-blue-600 font-medium hover:underline">Entrar</a>
    </p>
  </div>

</body>
</html>
