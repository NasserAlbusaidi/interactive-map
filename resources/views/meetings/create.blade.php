@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 space-y-8">
    <h1 class="text-2xl font-semibold mb-4">Create a New Meeting</h1>
    <form action="{{ route('meetings.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="flex flex-col space-y-2">
            <label class="text-sm font-bold text-gray-700" for="title">Title</label>
            <input class="border p-2 rounded" id="title" name="title" type="text" required>
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-sm font-bold text-gray-700" for="password">Password (Optional)</label>
            <input class="border p-2 rounded" id="password" name="password" type="password">
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-sm font-bold text-gray-700" for="description">Description (Optional)</label>
            <textarea class="border p-2 rounded" id="description" name="description"></textarea>
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-sm font-bold text-gray-700" for="start_time">Start Time</label>
            <input class="border p-2 rounded" id="start_time" name="start_time" type="time" required>
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-sm font-bold text-gray-700" for="end_time">End Time</label>
            <input class="border p-2 rounded" id="end_time" name="end_time" type="time" required>
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-sm font-bold text-gray-700" for="date">Date</label>
            <input class="border p-2 rounded" id="date" name="date" type="date" required>
        </div>

        <div class="flex flex-col space-y-2">
            <label class="text-sm font-bold text-gray-700" for="timezone">Time Zone (Optional)</label>
            <input class="border p-2 rounded" id="timezone" name="timezone" type="text">
        </div>

        <div class="flex justify-end">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                Create Meeting
            </button>
        </div>
    </form>
</div>

@endsection
