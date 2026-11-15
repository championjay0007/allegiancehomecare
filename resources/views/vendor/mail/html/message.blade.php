<x-mail::layout>
<x-slot:header>
<x-mail::header :url="config('app.url')">
Allegiance Heart &amp; Home Care
</x-mail::header>
</x-slot:header>

{{ $slot }}

@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} Allegiance Heart &amp; Home Care. {{ __('All rights reserved.') }}
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
