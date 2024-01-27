<?php


use function Livewire\Volt\state;

state([
    'language' => app()->getLocale(),
    'languages' => [
        'en' => 'english',
        'es' => 'español'
    ]
]);

$changeLanguage = function($language)
{
    session()->put('locale', $language);
    return redirect(request()->header('Referer'));
};
?>
@volt

<div x-data="{ dropdownOpen: false }"
     :class="{ 'block z-50 w-full p-4' : open, 'hidden': ! open }"
     class="relative flex-shrink-0 sm:p-0 sm:flex sm:w-auto sm:bg-transparent sm:items-center sm:ml-1.5"
     x-cloak
>
    <button @click="dropdownOpen=!dropdownOpen" class="inline-flex items-center justify-between w-full sm:px-3 sm:py-2 py-2.5 px-4 text-sm font-medium leading-4 text-gray-500 transition duration-0 border-transparent sm:border rounded-md hover:bg-gray-100/70 dark:text-white/70 dark:hover:text-gray-100 dark:bg-transparent dark:hover:bg-gray-800/70 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
        {{Str($language)->upper()}}
        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
    <div x-show="dropdownOpen" @click.away="dropdownOpen=false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 sm:scale-95" x-transition:enter-end="transform opacity-100 sm:scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 sm:scale-100" x-transition:leave-end="transform opacity-0 sm:scale-95"
         class="absolute top-0 right-0 z-50 w-full mt-16 sm:mt-12 sm:origin-top-right sm:w-40" x-cloak>
        <div class="p-4 pt-0 mt-1 space-y-3 text-gray-600 dark:text-white/70 bg-white dark:bg-gray-900 dark:shadow-xl sm:p-1 sm:space-y-0 sm:border sm:shadow-md sm:rounded-md border-gray-200/70 dark:border-white/10">
            <ul class="menu menu-sm gap-1" tabindex="0">
                @foreach($languages as $key => $item)
                <x-ui.lang-item language="{{$key}}" textLanguage="{{$item}}" currentLanguage="{{$language}}" />
                @endforeach
            </ul>


        </div>
    </div>


</div>

@endvolt
