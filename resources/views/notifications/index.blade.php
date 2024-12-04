@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 bg-gradient-to-r from-yellow-600 to-red-400 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-white mb-6">Notifications</h1>

            @if (session('success'))
                <p class="text-green-500 font-medium mb-4">{{ session('success') }}</p>
            @endif

            <div class="space-y-4">
                @forelse ($notifications as $notification)
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-semibold {{ $notification->updated_at ? 'text-gray-500' : 'text-gray-800' }}">
                            {{ $notification->title }}
                        </h2>
                        <p class="text-gray-700">{{ $notification->message }}</p>

                        @if ($notification->course)
                            <p class="mt-2 text-sm text-blue-500">
                                Related Course: 
                                <a 
                                    href="{{ route('courses.show', $notification->course->id) }}" 
                                    class="underline hover:text-blue-700">
                                    {{ $notification->course->course_name }}
                                </a>
                            </p>
                        @endif
                        @if ($notification->content)
                            <p class="mt-1 text-sm text-blue-500">
                                Related Content: 
                                <a 
                                    href="{{ route('contents.view', $notification->content->id) }}" 
                                    class="underline hover:text-blue-700">
                                    {{ $notification->content->title }}
                                </a>
                            </p>
                        @endif

                        <div class="mt-4 flex items-center gap-4">
                            <form 
                                action="{{ route('notifications.markAsRead', $notification->id) }}" 
                                method="POST">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">
                                    Mark as Read
                                </button>
                            </form>
                            <form 
                                action="{{ route('notifications.destroy', $notification->id) }}" 
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-200 text-lg">No notifications available.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
