<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-body bg-white">

                    <form action="{{route('tweets.store')}}" method="post">
                        @csrf
            <textarea name="content" class="textarea textarea-warning w-full" placeholder="ketikan ceritamu disini" rows="3"></textarea>
            <input type="submit" value="post" class="btn btn-primary">
                    </form>
                </div>
            </div>



            <div class="card my-4 bg-white">
         @foreach ($tweets as $tweet)
            <div class="card-body">
                <h2 class="text-x1 font-bold">{{ $tweet->user->name }}</h2>
                <p>{{ $tweet->content }}</p>
                <p class="text-end text-xs">{{ $tweet->created_at->diffForHumans()}}</p>
            </div>
        @endforeach
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
