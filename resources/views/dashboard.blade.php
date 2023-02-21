<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mt-4">
                    <form action="{{ route('comments.store') }}" method="post"
                          class="grid grid-cols-1 justify-items-center gap-4">
                        @csrf
                        <textarea name="content" id="content" cols="100" rows="10"></textarea>
                        <button type="submit" class="bg-gray-500 text-white p-2 rounded">Create</button>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="text-red-600">{{$error}}</div>
                            @endforeach
                        @endif
                    </form>
                </div>
                <div class="p-6 text-white mb-2">
                    @foreach($comments as $comment)
                        <div class="bg-gray-500 mt-4 p-2 shadow-md rounded">
                            <h1>
                                {{ $comment->content }}
                            </h1>
                            <b>
                                {{ $comment->user->name }} / {{ $comment->created_at->diffForHumans() }}
                            </b>
                            <hr>
                            <div class="text-gray-900 mt-2">
                                <form action="{{ route('replies.store', $comment->id) }}" method="post"
                                      class="grid grid-cols-1 justify-items-center gap-4">
                                    @csrf
                                    <label>
                                        <input type="text" name="reply" placeholder="Reply...">
                                    </label>
                                </form>
                            </div>
                            @foreach($comment->replies as $reply)
                                <div class="bg-gray-100 text-gray-800 mt-4 p-2 shadow-md rounded">
                                    <p>
                                        {{ $reply->content }}
                                    </p>
                                    <b>
                                        {{ $reply->user->name }} / {{ $reply->created_at->diffForHumans() }}
                                    </b>
                                </div>

                            @endforeach
                        </div>
                    @endforeach
                    <div class="mt-4">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
