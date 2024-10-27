<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleEdit() {
            document.getElementById('edit-form').classList.toggle('hidden');
            document.getElementById('user-details').classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-50">

    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Welcome, {{ $user->name }}!</h1>
            <p class="text-center text-gray-600 mb-4">Here are your details:</p>

            <div id="user-details" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-blue-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">Name:</strong>
                    <p class="text-gray-600">{{ $user->name }}</p>
                </div>

                <div class="bg-blue-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">Email:</strong>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>

                <div class="bg-blue-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">Division:</strong>
                    <p class="text-gray-600">{{ $user->division }}</p>
                </div>

                <div class="bg-blue-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">Class:</strong>
                    <p class="text-gray-600">{{ $user->class }}</p>
                </div>
            </div>

            <div class="mb-4">
                <strong class="text-gray-800">Account Created:</strong>
                <p class="text-gray-600">{{ $user->created_at->format('d M, Y') }}</p>
            </div>

            <div class="mb-6">
                <strong class="text-gray-800">Last Updated:</strong>
                <p class="text-gray-600">{{ $user->updated_at->format('d M, Y') }}</p>
            </div>

            <div class="flex justify-between mt-8">
                <button onclick="toggleEdit()" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition duration-200">Edit Profile</button>
                <a href="#" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition duration-200">Logout</a>
            </div>

            <!-- Edit Form -->
            <div id="edit-form" class="hidden mt-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Edit Your Details</h2>
                <form action="/update" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="email">Email</label>
                            <input type="email" id="email" name="email" readonly value="{{ $user->email }}" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm bg-gray-100 cursor-not-allowed" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="division">Division</label>
                            <input type="text" id="division" name="division" value="{{ $user->division }}" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1" for="class">Class</label>
                            <input type="text" id="class" name="class" value="{{ $user->class }}" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Marks Section -->
            <h2 class="text-3xl font-bold text-gray-800 mt-6 mb-4">Your Marks</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-green-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">Mathematics:</strong>
                    <p class="text-gray-600">{{ $user->mark->mathematics }}</p>
                </div>

                <div class="bg-green-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">Science:</strong>
                    <p class="text-gray-600">{{ $user->mark->science }}</p>
                </div>

                <div class="bg-green-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">English:</strong>
                    <p class="text-gray-600">{{ $user->mark->english }}</p>
                </div>

                <div class="bg-green-50 p-4 rounded-lg shadow">
                    <strong class="text-gray-800">History:</strong>
                    <p class="text-gray-600">{{ $user->mark->history }}</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
