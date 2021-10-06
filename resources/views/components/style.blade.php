@props(['url' => 'default'])

<style>
    @media (min-width: 768px) {
        #setImage {
            background-image: url({{ $url }})
        }
    }
</style>
