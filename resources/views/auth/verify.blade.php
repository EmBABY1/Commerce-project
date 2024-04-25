<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('please enter your code.') }}
    </div>

    <form method="POST" action="/checkcode">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="code" name="code" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="code" required />

            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
