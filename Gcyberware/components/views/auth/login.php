<!DOCTYPE html>
<html>

<!--  link a Tailwind e DaisyUI -->
<head>
    <!-- Tailwind + DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- BODY: QUI va messso il colore dello sfondo -->
<body class="bg-gradient-to-br from-slate-900 via-gray-800 to-slate-900">
    <!-- CONTENITORE: serve per centrare il form verticalmente -->
    <div class="min-h-screen flex items-center justify-center">

   <form method="POST" class="w-full max-w-md p-6 bg-white/80 backdrop-blur-md rounded-2xl shadow-lg text-gray-800">

    <h2 class="text-2xl font-bold text-center mb-6 text-gray-900">
        Login
    </h2>

    <div class="form-control mb-4">
        <label class="label">
            <span class="label-text text-gray-700">Username</span>
        </label>
       <input type="text" name="username" 
       class="input input-bordered bg-white text-gray-800 w-full" required>
    </div>

    <div class="form-control mb-4">
        <label class="label">
            <span class="label-text text-black">Password</span>
        </label>
       <input type="password" name="password" 
       class="input input-bordered bg-white text-black w-full" required>
    </div>

    <button type="submit" class="btn btn- w-full">
        Accedi
    </button>

    <p class="text-center mt-4 text-gray-600">
        Non hai un account? 
        <a href="/Gcyberware/public/register.php" class="link link-primary">
            Registrati
        </a>
    </p>

</form>