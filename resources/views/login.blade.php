<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-800 to-gray-900 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-md w-full">
        <!-- Form Header -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Login</h2>
            <p class="text-gray-500">Access your account</p>
        </div>

        <!-- Login Form -->
        <form action="/login" method="POST" class="space-y-6">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-gray-600 font-medium mb-1">Email</label>
                <input type="email" name="email" id="email"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-gray-600 font-medium mb-1">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Enter your password" required>
                @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>


            <!-- Submit Button -->
            <div class="text-center mt-6">
                <button type="submit"
                        class="w-full bg-indigo-500 text-white py-2 rounded-lg font-semibold hover:bg-indigo-600 transition duration-300">
                    Login
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <p class="mt-2 text-center text-gray-600">
            Don't have an account?
            <a href="/register" class="text-indigo-500 hover:underline">Register</a>
        </p>
    </div>

</body>
</html>
