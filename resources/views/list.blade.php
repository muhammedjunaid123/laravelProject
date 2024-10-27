<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">User Directory</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($users as $user)
                <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-4">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h2>
                            <p class="text-gray-600 text-sm">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mb-4">
                        <p class="text-gray-700"><strong>Division:</strong> {{ $user->division }}</p>
                        <p class="text-gray-700"><strong>Class:</strong> {{ $user->class }}</p>
                    </div>
                    <!-- Add Mark Button -->
                    <div class="text-right mt-4">
                        <a href="/mark/{{$user->id}}" class="bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-200">
                            Add Mark
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
