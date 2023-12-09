<section>
    <header>
        <div class="flex flex-row justify-between max-h">
            <h2 class="text-lg font-medium text-gray-900 justify-between">
                {{ __('My Books') }}
            </h2>
        </div>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("List of Books I have") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$book->id}}
                </th>
                <td class="px-6 py-4">
                    {{$book->title}}
                </td>
                <td class="px-6 py-4">
                    {{$book->category->name}}
                </td>
                <td class="px-6 py-4 self-end">
                    <div class="flex flex-row gap-4">
                        <a href="{{route('book.edit',$book->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                        <form method="POST" action="{{ route('book.destroy',$book->id)}}" >
                            @csrf
                            @method('delete')
                            <button type="submit" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                    </div>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</section>
