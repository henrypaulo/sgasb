<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar conta</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/tailwind.output.css')}}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('js/init-alpine.js')}}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>

    
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="{{asset('img/create-account-office.jpeg')}}"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="{{asset('img/close-homem-cortando-cabelo_23-2149141758.avif')}}"
              alt="Office"
            />
          </div>
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
              <div class="w-full">
                <h1
                class="mb-6 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Criar conta
              </h1>
                <div class="relative block text-left">
  <!-- Botão do dropdown -->
  <button type="button" class="inline-flex justify-center w-full hover:bg-gray-100 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-purple-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" id="menu-button" aria-expanded="false" aria-haspopup="true">
    Selecione o tipo de conta
    
  </button>

  <!-- Menu dropdown -->
  <div class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md bg-purple-600 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="dropdown-menu">
    <div class="py-1">
      <a href="#" class="text-white block px-4 py-2 text-sm hover:bg-gray-500" id="cliente-option">Cliente</a>
      <hr>
      <a href="#" class="text-white block px-4 py-2 text-sm hover:bg-gray-500" id="salao-option">Salão</a>
    </div>
  </div>
</div>
  <!-- Modal para Cadastro Cliente -->
  <div id="cliente-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96">
      <h2 class="text-xl font-bold mb-4">Cadastro de Cliente</h2>
      <form>
        <label for="nome-cliente" class="block text-sm font-medium text-gray-700">Nome</label>
        <input type="text" id="nome-cliente" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Digite o nome do cliente">

        <label for="email-cliente" class="block text-sm font-medium text-gray-700 mt-4">Email</label>
        <input type="email" id="email-cliente" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Digite o email do cliente">

          <!-- Telefones -->
      <label class="block text-sm font-medium text-gray-700 mt-4">Telefone(s)</label>
      <div id="telefones-cliente-wrapper">
        <input type="tel" name="telefones[]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md mb-2" placeholder="Ex: +244 912 345 678">
      </div>
      <button type="button" onclick="adicionarTelefone('telefones-cliente-wrapper')" class="text-sm text-purple-600 hover:underline mb-2">+ Adicionar outro número</button>

         <!-- Campo de Senha -->
      <label for="senha-cliente" class="block text-sm font-medium text-gray-700 mt-4">Senha</label>
      <input type="password" id="senha-cliente" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Digite sua senha">

      <!-- Campo de Confirmação de Senha -->
      <label for="confirma-senha-cliente" class="block text-sm font-medium text-gray-700 mt-4">Confirmar Senha</label>
      <input type="password" id="confirma-senha-cliente" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Confirme sua senha">
        <div class="mt-4 flex justify-end">
          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2" id="close-cliente-modal">  Voltar</button>
          <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-md">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>

<!-- Modal para Cadastro Salão -->
<div id="salao-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
  <div class="bg-white rounded-lg p-6 w-full h-full max-w-4xl max-h-full overflow-y-auto">
    <h2 class="text-3xl font-bold mb-6 text-center text-purple-700">Cadastro de Salão</h2>
    
    <form enctype="multipart/form-data" class="space-y-4">
      @csrf
      
      <!-- Nome e Descrição -->
      <div>
        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Salão</label>
        <input type="text" name="nome" id="nome" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Ex: Salão Elegância" required>
      </div>
<div>
  <label for="nome_proprietario" class="block text-sm font-medium text-gray-700">Nome do Proprietário</label>
  <input type="text" name="nome_proprietario" id="nome_proprietario" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-lg" placeholder="Digite o nome do proprietário" required>
</div>


      <!-- Localização -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
          <input type="text" name="latitude" id="latitude" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="-8.838333">
        </div>

        <div>
          <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
          <input type="text" name="longitude" id="longitude" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="13.234444">
        </div>
      </div>

      <!-- Imagens -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="foto_perfil" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
          <label class="flex items-center justify-center px-4 py-2 mt-1 bg-purple-100 text-purple-700 border border-dashed border-purple-400 rounded-md cursor-pointer hover:bg-purple-200">
            <span>Selecionar imagem...</span>
            <input type="file" name="foto_perfil" id="foto_perfil" class="hidden">
          </label>
        </div>

        <div>
          <label for="foto_externa" class="block text-sm font-medium text-gray-700">Foto da Fachada</label>
          <label class="flex items-center justify-center px-4 py-2 mt-1 bg-purple-100 text-purple-700 border border-dashed border-purple-400 rounded-md cursor-pointer hover:bg-purple-200">
            <span>Selecionar imagem...</span>
            <input type="file" name="foto_externa" id="foto_externa" class="hidden">
          </label>
        </div>
      </div>

      <!-- Informações fiscais e contacto -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="nif" class="block text-sm font-medium text-gray-700">NIF (Número de Identificação Fiscal)</label>
          <input type="text" name="nif" id="nif" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Digite o NIF">
        </div>

        <div>
          <label for="iban" class="block text-sm font-medium text-gray-700">IBAN</label>
          <input type="text" name="iban" id="iban" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Digite o IBAN">
        </div>
      </div>

      <!-- Telefones -->
<label class="block text-sm font-medium text-gray-700 mt-4">Telefone(s)</label>
<div id="telefones-salao-wrapper">
  <input type="tel" name="telefones[]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md mb-2" placeholder="Ex: +244 943 000 111">
</div>
<button type="button" onclick="adicionarTelefone('telefones-salao-wrapper')" class="text-sm text-purple-600 hover:underline mb-2">+ Adicionar outro número</button>

      <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-lg" placeholder="exemplo@dominio.com" required>
      </div>
      <!-- Senha -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
          <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Crie uma senha" required>
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Confirme a senha" required>
        </div>
      </div>

      <!-- Botões -->
      <div class="flex justify-end mt-6">
        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md mr-2" id="close-salao-modal">Voltar</button>
        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-md">Cadastrar</button>
      </div>
    </form>
  </div>
</div>
          </div>
        </div>
      </div>
    </div>
 <script>
    // Variáveis para os elementos
    const dropdownMenu = document.getElementById('dropdown-menu');
    const menuButton = document.getElementById('menu-button');
    const clienteOption = document.getElementById('cliente-option');
    const salaoOption = document.getElementById('salao-option');
    
    // Modais
    const clienteModal = document.getElementById('cliente-modal');
    const salaoModal = document.getElementById('salao-modal');
    
    // Fechar modais
    const closeClienteModal = document.getElementById('close-cliente-modal');
    const closeSalaoModal = document.getElementById('close-salao-modal');
    
    // Abrir dropdown
    menuButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });

    // Abrir modal Cliente
    clienteOption.addEventListener('click', (e) => {
      e.preventDefault(); // Previne o link de ser seguido
      clienteModal.classList.remove('hidden');
      dropdownMenu.classList.add('hidden');
    });

    // Abrir modal Salão
    salaoOption.addEventListener('click', (e) => {
      e.preventDefault(); // Previne o link de ser seguido
      salaoModal.classList.remove('hidden');
      dropdownMenu.classList.add('hidden');
    });

    // Fechar modais
    closeClienteModal.addEventListener('click', () => {
      clienteModal.classList.add('hidden');
    });
    
    closeSalaoModal.addEventListener('click', () => {
      salaoModal.classList.add('hidden');
    });

    // Fechar modais ao clicar fora
    window.addEventListener('click', (e) => {
      if (!e.target.closest('.bg-white')) {
        clienteModal.classList.add('hidden');
        salaoModal.classList.add('hidden');
      }
    });

    function adicionarTelefone(wrapperId) {
    const wrapper = document.getElementById(wrapperId);
    const input = document.createElement('input');
    input.type = 'tel';
    input.name = 'telefones[]';
    input.placeholder = 'Ex: +244 9XX XXX XXX';
    input.className = 'mt-1 block w-full p-2 border border-gray-300 rounded-md mb-2';
    wrapper.appendChild(input);
  }
  </script>
    
  </body>
</html>
