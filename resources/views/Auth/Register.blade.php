<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    @if ($errors->any())
    <div class="bg-red-100 border text-center border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="container mx-auto mt-14">
        <div class="max-w-lg mx-auto  my-10 bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md mt-25">
            <a href="/Acceuil" class="navbar-brand flex items-center justify-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{ asset('images/logo/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h5 class="m-0 text-primary">Agency</h5>
            </a>
            <div class="flex justify-center items-center  rounded-lg p-5 space-x-5">
                <h1 class="text-2xl font-semibold text-blue-700 bg-green-100 rounded-lg">Register</h1>
                <hr class="border-t-2 border-gray-400 h-full">
                <a href="{{ route('login') }}" class="text-2xl font-semibold text-blue-700">Login</a>
            </div>
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-4">
                    <label for="firstname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prenom</label>
                    <input type="text" id="firstname" placeholder="firstname.." name="firstname" class="mt-1  p-2.5 block w-full rounded-md border border-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100 dark:bg-gray-700 dark:text-gray-100" required>
                     <span  class="text-red-500 error-messages firstname"></span>
                </div>
                <div class="mb-4">
                    <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                    <input type="text" id="lastname" placeholder="lastname.." name="lastname" class="mt-1  p-2.5 block w-full rounded-md border border-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100 dark:bg-gray-700 dark:text-gray-100" required>
                     <span  class="text-red-500 error-messages lastname"></span>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" placeholder="Email.." name="email" class="mt-1  p-2.5 block w-full rounded-md border border-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100 dark:bg-gray-700 dark:text-gray-100" required>
                     <span  class="text-red-500 error-messages email"></span>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mot de passe</label>
                    <input type="password" id="password" placeholder="Password" name="password" class="mt-1  p-2.5 block w-full rounded-md border border-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100 dark:bg-gray-700 dark:text-gray-100" required>
                     <span  class="text-red-500 error-messages password"></span>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmation mot de passe</label>
                    <input type="password" id="password_confirmation" placeholder="Confirm password.." name="password_confirmation" class="mt-1  p-2.5 block w-full rounded-md border border-blue-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100 dark:bg-gray-700 dark:text-gray-100" required>
                     <span  class="text-red-500 error-messages  password_confirmation"></span>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Register</button>
                    <a href="{{ route('login') }}" class="text-sm text-indigo-500 hover:text-indigo-700">Vous avez deja un compte? Login</a>
                </div>
            </form>
        </div>
    </div>





    <script>
        const registrationForm = document.getElementById('registrationForm');
        const firstNameInput = document.getElementById('firstname');
        const lastNameInput = document.getElementById('lastname');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
      
        const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[^\s]{8,}$/; 
      
        function showErrorMessage(input, message) {
          const errorSpan = input.nextElementSibling;
          errorSpan.textContent = message;
          input.classList.add('border-red-500'); 
        }
      
        function clearErrorMessage(input) {
          const errorSpan = input.nextElementSibling;
          errorSpan.textContent = '';
          input.classList.remove('border-red-500'); 
        }
      
        firstNameInput.addEventListener('keyup', function() {
          if (this.value.trim() === '') {
            showErrorMessage(this, 'Prenom est Obligatoire.');
          } else {
            clearErrorMessage(this);
          }
        });
      
        lastNameInput.addEventListener('keyup', function() {
          if (this.value.trim() === '') {
            showErrorMessage(this, 'Nom est Obligatoire.');
          } else {
            clearErrorMessage(this);
          }
        });
      
        emailInput.addEventListener('keyup', function() {
          if (!emailRegex.test(this.value)) {
            showErrorMessage(this, 's\'il te plaît saisir une valide adresse email');
          } else {
            clearErrorMessage(this);
          }
        });
      
        passwordInput.addEventListener('keyup', function() {
          if (!passwordRegex.test(this.value)) {
            showErrorMessage(this, 'Le mot de passe doit comporter au moins 8 caractères, contenant un chiffre, une lettre minuscule et une lettre majuscule.');
          } else {
            clearErrorMessage(this);
          }
        });
      
        confirmPasswordInput.addEventListener('keyup', function() {
          if (this.value !== passwordInput.value) {
            showErrorMessage(this, 'Les mots de passe ne correspondent pas.');
          } else {
            clearErrorMessage(this);
          }
        });
      
        registrationForm.addEventListener('submit', function(event) {
          let hasErrors = false;
          const inputs = [firstNameInput, lastNameInput, emailInput, passwordInput, confirmPasswordInput];
          for (const input of inputs) {
            if (input.nextElementSibling.textContent !== '') { 
              hasErrors = true;
              break;
            }
          }
      
          if (hasErrors) {
            event.preventDefault();
          }
        });
      </script>
      
</body>

</html>
