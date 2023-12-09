<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add a Book') }}
        </h2>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('book.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Book Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', '')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Book Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', '')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected>Choose a category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('success'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Book Added Successfully') }}</p>
            @endif
        </div>
    </form>
</section>
