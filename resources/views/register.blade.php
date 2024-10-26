<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-lg w-full">
        <!-- Form Header -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Register</h2>
            <p class="text-gray-500">Create a new account to get started</p>
        </div>

        <!-- Form Body -->
        <form action="/register" method="POST" class="space-y-6"> <!-- Update action as needed -->
            @csrf

            <!-- Name Field -->
            <div class="mb-4">
                <div class="flex flex-col">
                    <label for="name" class="block text-gray-600 font-medium mb-1">Name</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}"
                           class="w-full px-4 py-2 border @error('name') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Enter your name" required>
                    @error('name')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <div class="flex flex-col">
                    <label for="email" class="block text-gray-600 font-medium mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}"
                           class="w-full px-4 py-2 border @error('email') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Enter your email" required>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <div class="flex flex-col">
                    <label for="password" class="block text-gray-600 font-medium mb-1">Password</label>
                    <input type="password" name="password" id="password" value="{{old('password')}}"
                           class="w-full px-4 py-2 border @error('password') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Enter your password" required>
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Class and Division Fields in a Row -->
            <div class="mb-4 grid grid-cols-2 gap-4">
                <!-- Class Field -->
                <div>
                    <label for="class" class="block text-gray-600 font-medium mb-1">Class</label>
                    <input type="text" name="class" id="class" value="{{old('class')}}"
                           class="w-full px-4 py-2 border @error('class') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Enter your class" required>
                    @error('class')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Division Field -->
                <div>
                    <label for="division" class="block text-gray-600 font-medium mb-1">Division</label>
                    <input type="text" name="division" id="division" value="{{old('division')}}"
                           class="w-full px-4 py-2 border @error('division') border-red-500 @enderror border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Enter your division" required>
                    @error('division')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-6">
                <button type="submit" 
                        class="w-full bg-indigo-500 text-white py-2 rounded-lg font-semibold hover:bg-indigo-600 transition duration-300">
                    Register
                </button>
            </div>
        </form>
        
        <!-- Already have an account? -->
        <p class="mt-6 text-center text-gray-600">
            Already have an account? 
            <a href="/login" class="text-indigo-500 hover:underline">Login</a> <!-- Update link as needed -->
        </p>
    </div>

</body>
</html>
