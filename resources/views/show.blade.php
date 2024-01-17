@extends('layouts.main')

@section('content')
    {{-- Movie Info Start --}}
    <div class="movie-info border-b border-grey-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="w-64 md:w-96">

            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}
                    ({{ \Carbon\Carbon::parse($movie['release_date'])->format('Y') }})</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
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
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 3)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}"
                            class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
    {{-- Movie Info End --}}

    {{-- Movie Cast Start --}}
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 10)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}" alt="actor"
                                    class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                                <div class="text-gray-400 text-sm">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- Movie Cast End --}}

    {{-- Movie Image Start --}}
    <div class="movie-image border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 12)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="image"
                                    class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- Movie Image End --}}
@endsection
