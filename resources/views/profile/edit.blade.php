<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
{{-- <div class="container mx-auto px-4 bg-gradient-to-r from-red-600 to-yellow-400 min-h-screen">
 --}}
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-gradient-to-r from-red-600 to-yellow-400 shadow-lg rounded-lg p-8 max-w-md w-full">
        <!-- Title -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Profile</h1>

        <!-- Role Display -->
        <div class="mb-4">
            <span class="block text-sm font-medium text-gray-500">Role:</span>
            <span class="text-lg font-semibold text-gray-800">{{ ucfirst($user->role) }}</span>
        </div>

        <!-- Edit Profile Form -->
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ old('username', $user->username) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <!-- Update Button -->
            <div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white text-lg font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                    Update Profile
                </button>
            </div>
        </form>

        <!-- Delete Account -->
        <form action="{{ route('profile.destroy') }}" method="POST" class="mt-6">
            @csrf
            @method('DELETE')

            <button 
                type="submit" 
                class="w-full bg-red-600 text-white text-lg font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-200">
                Delete Account
            </button>
            <div class="text-center mt-5">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </form>
    </div>
</body>
</html>
