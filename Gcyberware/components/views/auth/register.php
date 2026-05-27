<!DOCTYPE html>
<html data-theme="light">

<head>
    <!-- DaisyUI + Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950">

    <div class="min-h-screen flex items-center justify-center">

        <form method="POST" class="w-full max-w-md p-7 bg-white/90 backdrop-blur-md rounded-2xl shadow-xl">

            <h2 class="text-2xl font-bold text-center mb-6 text-gray-900">
                Creazione account
            </h2>

            <!-- EMAIL -->
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-gray-700">Email</span>
                </label>
                <input type="email" name="email"
                       class="input input-bordered bg-white text-gray-800 placeholder:text-gray-400 focus:text-gray-800 w-full" required>
            </div>

            <!-- USERNAME -->
            <div class="form-control mb-4">
                <label class="label">
                    <span class="label-text text-gray-700">Username</span>
                </label>
                <input type="text" name="username"
                       class="input input-bordered bg-white text-gray-800 placeholder:text-gray-400 focus:text-gray-800 w-full" required>
            </div>

            <!-- PASSWORD -->
            <div class="form-control mb-6">
                <label class="label">
                    <span class="label-text text-gray-700">Password</span>
                </label>
                <input type="password" name="password"
                       class="input input-bordered bg-white text-gray-800 placeholder:text-gray-400 focus:text-gray-800 w-full" required>
            </div>

            <!-- BOTTONE -->
            <button type="submit" class="btn btn-neutral w-full">
                Registrati
            </button>

            <!-- LINK LOGIN -->
            <p class="text-center mt-5 text-gray-600">
                Hai già un account?
                <a href="/Gcyberware/public/login.php" class="link link-primary">
                    Accedi
                </a>
            </p>

        </form>

    </div>

</body>
</html>