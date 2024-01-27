@props([
'language' => '',
'textLanguage' => '',
'currentLanguage' => '',
])

@if(Str::upper($language) == Str::upper($currentLanguage))

<li class="py-2" >
    <span class="bg-gray-100 border border-gray-800 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:border-gray-300 dark:text-gray-300">{{Str($language)->upper()}}</span> {{Str($textLanguage)->ucfirst()}}

</li>
@else


<li class="py-2"><button wire:click="changeLanguage('{{$language}}')">
        <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{Str($language)->upper()}}</span>  {{Str($textLanguage)->ucfirst()}}
    </button>
</li>
@endif
