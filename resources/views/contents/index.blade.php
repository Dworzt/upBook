@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 bg-gradient-to-r from-blue-400 to-green-400 min-h-screen">
<br>
<br>
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Contents</h1>

    <div class="flex justify-end mb-6">
        <a href="{{ route('contents.create') }}" class="px-6 py-2 bg-blue-500 text-white font-medium rounded-lg shadow hover:bg-blue-600 transition duration-200">
            + Create New Content
        </a>
    </div>

    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="table-auto w-full border-collapse bg-white rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold uppercase">#</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold uppercase">Media Type</th>
                    <th class="px-6 py-3 text-left text-gray-600 font-semibold uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contents as $content)
                    <tr class="border-b hover:bg-gray-100 transition duration-200">
                        <td class="px-6 py-4 text-gray-700">{{ $content->id }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $content->title }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ ucfirst($content->media_type) }}</td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('contents.show', $content->id) }}" class="text-blue-500 hover:underline">View</a>
                            <a href="{{ route('contents.edit', $content->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                            <form action="{{ route('contents.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this content?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No content found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
