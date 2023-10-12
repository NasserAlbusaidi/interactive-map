@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Meetings</h1>
        <div class="mb-4">
        <a href="{{ route('meetings.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Meeting
        </a>
        </div>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md pt-2">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Created By</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($meetings as $meeting)
                <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-gray-100' : '' }} hover:bg-gray-200">
                    <td class="py-2 px-4 border-b">{{ $meeting->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $meeting->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $meeting->description ? $meeting->description : 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $meeting->user->name }}</td>
                    <td class="py-2 px-4 border-b flex space-x-2">
                        <a href="{{ route('meeting.join', $meeting->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">

                            Join
                        </a>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                            Delete
                        </button>

                        <form action="{{ route('meeting.signal', $meeting->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                Signal
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


@endsection
