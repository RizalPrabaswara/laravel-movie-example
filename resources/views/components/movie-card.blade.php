<div>
    <div class="mt-8">
        <a href="{{ route('movies.show', $movie['id']) }}">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="poster"
                class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="mt-2">
            <a href="{{ route('movies.show', $movie['id']) }}"
                class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
            <div class="flex items-center text-gray-400 text-sm mt-1">
                <svg id='Star_24' class="fill-current text-orange-500 w-4" viewBox='0 0 24 24'
                    xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />


                    <g transform="matrix(0.48 0 0 0.48 12 12)">
                        <path
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,202,40); fill-rule: nonzero; opacity: 1;"
                            transform=" translate(-24, -24)"
                            d="M 24 13 L 26.9 18.9 L 27.799999999999997 20.799999999999997 L 29.9 21.099999999999998 L 36.4 21.999999999999996 L 31.7 26.599999999999994 L 30.2 28.099999999999994 L 30.599999999999998 30.199999999999996 L 31.7 36.699999999999996 L 25.9 33.599999999999994 L 24 32.599999999999994 L 22.1 33.599999999999994 L 16.3 36.699999999999996 L 17.400000000000002 30.199999999999996 L 17.8 28.099999999999994 L 16.3 26.599999999999994 L 11.600000000000001 21.999999999999993 L 18.1 21.099999999999994 L 20.200000000000003 20.799999999999994 L 21.1 18.899999999999995 L 24 13 M 24 4 L 17.5 17.2 L 3 19.3 L 13.5 29.5 L 11 44 L 24 37.2 L 37 44 L 34.5 29.5 L 45 19.3 L 30.5 17.2 L 24 4 L 24 4 z"
                            stroke-linecap="round" />
                    </g>
                </svg>
                <span class="ml-1">{{ round($movie['vote_average'] * 10) . '%' }}</span>
                <span class="mx-2">|</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
            </div>
            <div class="text-gray-400 text-sm">
                @foreach ($movie['genre_ids'] as $genre)
                    {{ $genres->get($genre) }}@if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
