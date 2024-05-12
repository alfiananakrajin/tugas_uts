<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('timeline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-body bg-white">

                    <!-- Form for creating a new tweet -->
                    <form action="{{route('tweets.store')}}" method="post">
                        @csrf
                        <!-- Textarea for tweet content -->
                        <textarea name="content" class="textarea textarea-warning w-full" placeholder="ketikan ceritamu disini" rows="3"></textarea>
                        <!-- Submit button for posting the tweet -->
                        <input type="submit" value="post" class="btn btn-primary">
                    </form>
                </div>
            </div>

            <!-- Loop through all tweets and display them -->
            @foreach ($tweets as $tweet)
                <div class="card my-4 bg-white">
                    <div class="card-body">
                        <!-- Display the tweet's author name -->
                        <h2 class="text-xl font-bold">{{ $tweet->user?->name }}</h2>
                        <!-- Display the tweet's content -->
                        <p>{{ $tweet->content }}</p>
                        <div class="text-end">
                            <!-- If the current user is the author of the tweet, display edit and delete buttons -->
                            @if ($tweet->user_id == auth()->id())
                                <div class="flex justify-end gap-2">
                                    <!-- Edit button for the tweet -->
                                    <form action="{{ route('tweets.edit', $tweet->id)}}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-success w-20">Edit</button>
                                    </form>
                                    <!-- Delete button for the tweet -->
                                    <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-error w-20">Delete</button>
                                    </form>
                                </div>
                            @endif
                            <!-- Display the time since the tweet was created -->
                            <span class="text-sm">{{ $tweet->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
