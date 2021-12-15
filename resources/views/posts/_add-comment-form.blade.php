@auth
    <form method="POST" action="/posts/{{$post->slug}}/comments" class="border border-gray-200 p-6 rounded-xl">
        @csrf


        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="60" height="60" class="rounded-full">
            <h2 class="ml-4">
                Leave a comment
            </h2>
        </header>
        <div class="mt-6">
            <textarea
            name="body"
            class="w-full text-sm focus:outline-none focus:ring"
            rows="3"
            placeholder="Share your thoughts"
            style="border-radius: 10px; padding-left: 5px; padding-top: 3px"></textarea>
            @error('body')
              <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
        </div>
        <x-submit-button></x-submit-button>
    </form>
@else
    <p>
        <a href="/login" class="hover:bg-blue-600 bg-blue-500 rounded-2xl text-white py-2 pl-1 pr-1">Login to comment</a>
    </p>
@endauth
