@props(['name'])

<span class="mb-1 block text-xs text-red-500 font-semibold">@error($name) {{ $message }} @enderror</span>
