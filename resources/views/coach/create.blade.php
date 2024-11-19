<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coach</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="max-w-lg mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Add a New Coach</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-5 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('coach.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div>
                <label for="specialization" class="block text-sm font-medium">Specialization</label>
                <input type="text" name="specialization" id="specialization" class="block w-full border-gray-300 rounded-md">
                @error('specialization')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="bio" class="block text-sm font-medium">Bio</label>
                <textarea name="bio" id="bio" rows="4" class="block w-full border-gray-300 rounded-md"></textarea>
                @error('bio')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="experience" class="block text-sm font-medium">Experience (years)</label>
                <input type="number" name="experience" id="experience" class="block w-full border-gray-300 rounded-md" min="0">
                @error('experience')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Coach</button>
        </form>
        <div class="mt-5">
            <a href="{{ route('coach.dash') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>
