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
            </div>
        </div>
    </div>
</x-app-layout>
