<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">

    <div class="container mx-auto py-12">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Add Marks for {{ $user->name }}</h1>
            <form action="/mark" method="POST"> <!-- Replace with actual route -->
                @csrf
                @if($user->mark)
                @method('PATCH')
                <input type="hidden" value="{{$user->mark->id}}" name="id">
                @endif
                <!-- Mathematics Field -->
                <input type="hidden" value="{{$user->id}}" name="std_id">
                <div class="mb-6">
                    <label for="mathematics" class="block text-gray-700 font-medium">Mathematics</label>
                    <input type="number" id="mathematics" value="{{$user->mark->mathematics??0}}" name="mathematics" min="0" max="100" placeholder="Enter marks"
                        class="mt-2 p-3 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                    @if($errors->has('mathematics'))
                    <span class="text-red-500 text-sm">{{ $errors->first('mathematics') }}</span>
                    @endif
                </div>

                <!-- Science Field -->
                <div class="mb-6">
                    <label for="science" class="block text-gray-700 font-medium">Science</label>
                    <input type="number" value="{{$user->mark->science??0}}" id="science" name="science" min="0" max="100" placeholder="Enter marks"
                        class="mt-2 p-3 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                    @if($errors->has('science'))
                    <span class="text-red-500 text-sm">{{ $errors->first('science') }}</span>
                    @endif
                </div>

                <!-- English Field -->
                <div class="mb-6">
                    <label for="english" class="block text-gray-700 font-medium">English</label>
                    <input type="number" value="{{$user->mark->english??0}}" id="english" name="english" min="0" max="100" placeholder="Enter marks"
                        class="mt-2 p-3 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                    @if($errors->has('english'))
                    <span class="text-red-500 text-sm">{{ $errors->first('english') }}</span>
                    @endif
                </div>

                <!-- History Field -->
                <div class="mb-6">
                    <label for="history" class="block text-gray-700 font-medium">History</label>
                    <input type="number" value="{{$user->mark->history??0}}" id="history" name="history" min="0" max="100" placeholder="Enter marks"
                        class="mt-2 p-3 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                    @if($errors->has('history'))
                    <span class="text-red-500 text-sm">{{ $errors->first('history') }}</span>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-200">Save Marks</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>