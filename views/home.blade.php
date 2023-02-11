@extends('layouts.base')

@section('title', trans('messages.home'))

@section('app')
    <div class="home-background d-flex align-items-center justify-content-end flex-column text-white pb-md-15 pb-3 " style="background: rgb(87,110,247);background: radial-gradient(circle, rgba(87,110,247,0) 6%, rgba(var(--bs-black-rgb),0.6) 98%),linear-gradient(rgba(18,23,37,0.79), rgba(var(--bs-light-rgb),0.8)),url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center; background-size: cover">

        <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-md-4">
            <div data-clipboard-text="{{theme_config('hero.server.ip') ?? 'play.dixept.fr'}}" class="copy_ip hero-small-box d-flex align-items-center gap-3 bg-dark bg-opacity-25 p-3" style="cursor : pointer;">
                <div>
                    <h2 class="m-0 fs-5">
                        @forelse($servers->where('home_display') as $server)
                            @if($server->isOnline())
                                {{$server->getOnlinePlayers()}} {{theme_config('hero.server.text') ?? 'PLAYERS ONLINE'}}
                            @else
                                SERVER OFFLINE
                            @endif
                        @empty
                            SERVEUR OFFLINE
                        @endforelse
                    </h2>
                    <div class="position-relative">
                        <p class="ip_address m-0">{{theme_config('hero.server.ip') ?? 'play.dixept.fr'}}</p>
                        <span class="ip_copy position-absolute text-nowrap bg-secondary rounded-3 mx-5 px-2 py-1 text-center d-none">{{theme_config('hero.server.textcopied') ?? 'IP COPIED!'}}</span>
                    </div>
                </div>
                <i class="{{theme_config('hero.server.icon') ?? 'bi bi-box-fill'}} fs-1"></i>
{{--                <svg width="50" height="50" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path d="M4,2H20A2,2 0 0,1 22,4V20A2,2 0 0,1 20,22H4A2,2 0 0,1 2,20V4A2,2 0 0,1 4,2M6,6V10H10V12H8V18H10V16H14V18H16V12H14V10H18V6H14V10H10V6H6Z">--}}
{{--                    </path>--}}
{{--                </svg>--}}
            </div>
            <a class="navbar-brand" href="{{ route('home') }}">
                @if(setting('logo'))
                    <img width="200" height="200" style="object-fit: contain;" src="{{ image_url(setting('logo')) }}" alt="Logo">
                @else
                    {{ site_name() }}
                @endif
            </a>
            <a href="{{theme_config('hero.discord.url') ?? 'https://discord.gg/Gh2ddyBxUWvV'}}" target="_blank" class="hero-small-box d-flex align-items-center gap-3 bg-dark bg-opacity-25 p-3 text-white text-decoration-none">
                <i class="{{theme_config('hero.discord.icon') ?? 'bi bi-discord'}} fs-1"></i>
{{--                <svg width="50" height="50" class="herosvg" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240">--}}
{{--                    <path class="st0" d="M104.4 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zM140.9 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z">--}}
{{--                    </path>--}}
{{--                    <path class="st0" d="M189.5 20h-134C44.2 20 35 29.2 35 40.6v135.2c0 11.4 9.2 20.6 20.5 20.6h113.4l-5.3-18.5 12.8 11.9 12.1 11.2 21.5 19V40.6c0-11.4-9.2-20.6-20.5-20.6zm-38.6 130.6s-3.6-4.3-6.6-8.1c13.1-3.7 18.1-11.9 18.1-11.9-4.1 2.7-8 4.6-11.5 5.9-5 2.1-9.8 3.5-14.5 4.3-9.6 1.8-18.4 1.3-25.9-.1-5.7-1.1-10.6-2.7-14.7-4.3-2.3-.9-4.8-2-7.3-3.4-.3-.2-.6-.3-.9-.5-.2-.1-.3-.2-.4-.3-1.8-1-2.8-1.7-2.8-1.7s4.8 8 17.5 11.8c-3 3.8-6.7 8.3-6.7 8.3-22.1-.7-30.5-15.2-30.5-15.2 0-32.2 14.4-58.3 14.4-58.3 14.4-10.8 28.1-10.5 28.1-10.5l1 1.2c-18 5.2-26.3 13.1-26.3 13.1s2.2-1.2 5.9-2.9c10.7-4.7 19.2-6 22.7-6.3.6-.1 1.1-.2 1.7-.2 6.1-.8 13-1 20.2-.2 9.5 1.1 19.7 3.9 30.1 9.6 0 0-7.9-7.5-24.9-12.7l1.4-1.6s13.7-.3 28.1 10.5c0 0 14.4 26.1 14.4 58.3 0 0-8.5 14.5-30.6 15.2z">--}}
{{--                    </path>--}}
{{--                </svg>--}}
                <div>
                    <h2 class="m-0 fs-5"><span class="discord-list_count"></span> {{theme_config('hero.discord.text') ?? 'UTILISATEURS EN LIGNE'}}</h2>
                    <p class="m-0">{{theme_config('hero.discord.url') ? str_replace(['https://', 'http://', 'discord.gg'], ['','','DISCORD.GG'], theme_config('hero.discord.url')):'DISCORD.GG/Gh2yBxUWvV'}}</p>
                </div>
            </a>

        </div>
    </div>

    <div class="bg-body content">
        <div class="container">
            @include('elements.session-alerts')

            @if($message)
                <div class="card mb-4">
                    <div class="card-body">
                        {{ $message }}
                    </div>
                </div>
            @endif
            @if(theme_config('event.box.toggle'))
                <div class="container py-8 pb-2">
                    <div class="d-flex flex-column flex-md-row gap-md-4 bg-secondary bg-opacity-75 mx-md-8">
                        <div class="d-flex align-items-center justify-content-md-start justify-content-center bg-secondary bg-opacity-75 px-3 py-2">
                            <i class="{{theme_config('event.box.icon') ?? 'bi bi-info-circle'}} fs-2"></i>
                        </div>
                        <div class="d-flex flex-column text-md-start text-center py-3">
                            <h2 class="m-0 fw-bold fs-4">{{theme_config('event.box.text') ?? 'ÉVENEMENT:'}}</h2>
                            <p class="m-0 px-4 mt-2">{{theme_config('event.box.paragraph') ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam animi deleniti distinctio dolor doloribus eos esse, maiores pariatur sint?'}}</p>
                            @if(theme_config('event.box.togglelink'))
                                <div class="align-self-md-end align-self-center m-1 mx-3 mt-md-1 mt-4">
                                    <a class="btn btn-primary" href="{{theme_config('event.box.urllink') ?? 'https://dixept.fr'}}" target="_blank"><i class="{{theme_config('event.box.iconlink') ?? 'bi bi-discord'}}"></i> {{theme_config('event.box.textlink') ?? 'Discord'}}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="row py-8">
                <div class="col-md-3 p-0">
                    <div class="d-flex justify-content-center bg-dark text-center border-bottom-0 rounded-start py-5 mb-3 mx-md-0 mx-2">
                        <a href="{{theme_config('block.button.url') ?? '/shop'}}" @if(theme_config('block.button.blank') && theme_config('block.button.blank') == 'on') target="_blank" @endif class="d-flex justify-content-center gap-1 btn btn-secondary px-3 py-2 fs-3 text-decoration-none rounded fw-bolder text-nowrap"><i class="d-none d-lg-block {{theme_config('block.button.icon') ?? 'bi bi-arrow-right'}}"></i> {{theme_config('block.button.text') ?? 'BOUTIQUE'}}</a>
                    </div>
                    @if(!theme_config('block.discord.toggle'))
                    <div class="text-center mx-2">
                        <h2 class="fs-3 mb-3 text-uppercase">{{trans('theme::admin.discord')}}</h2>
                        <div class="bg-dark rounded-3" style="border-radius: 12px;">
                            @include('components.general.discord')
                        </div>
                        <hr>
                    </div>
                    @endif
                    @if(!theme_config('block.twitter.toggle'))
                    <div class="text-center mx-2">
                        <h2 class="fs-3 text-uppercase">{{trans('theme::admin.twitter')}}</h2>
                        <div>
                            @include('components.general.twitter', ['limit' => theme_config('block.twitter.amount') ?? 3, 'theme' => theme_config('block.twitter.theme') ?? 'white'])
                        </div>
                        <hr>
                    </div>
                    @endif
                </div>
                <div class="col-md-9 p-0">
                    @if(! $posts->isEmpty())
                        <div class="bg-dark text-center py-3 border-bottom-0 rounded-end">
                            <h2 class="m-0 text-white text-uppercase">{{trans('messages.news')}}</h2>
                        </div>

                        <div class="bg-dark bg-opacity-10 p-md-4">
                            <div class="row gy-3 m-0">
                                @foreach($posts as $post)
                                    <div class="{{$loop->first ? 'col-md-12 m-0':' col-md-6'}}" @if(!$loop->first) style="height: 300px;" @endif>
                                        <div class="post-preview card h-100">
                                            @if($post->hasImage())
                                                <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" @if($loop->first) height="450" @endif style="object-fit: cover" class="card-img-top h-100">
                                            @endif
                                            <div class="position-absolute bottom-0 end-0 start-0 card-body bg-dark bg-opacity-50 d-flex flex-column justify-content-center text-center">
                                                <h3 class="card-title {{$loop->first ? '':'fs-5 text-center'}}">
                                                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                                                <p class="{{$loop->first ? '':'d-none'}} card-text text-white-50 text-clip">{{ Str::limit(strip_tags($post->content), 250) }}</p>
                                                <div class="{{$loop->first ? '':'d-none'}}">
                                                    <a class="d-none d-md-block btn btn-primary" href="{{ route('posts.show', $post) }}">{{ trans('messages.posts.read') }}</a>
                                                </div>
                                            </div>
                                            <div class="position-absolute top-0 card-header text-muted">
                                                {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => site_name()]) }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="bg-dark text-center py-3 border-bottom-0 rounded-end">
                            <h2 class="m-0 text-white text-uppercase">{{trans('messages.news')}}</h2>
                        </div>
                        <div class="bg-dark bg-opacity-10 p-md-4">
                            <div class="row gy-3 m-0">
                                <p>{{trans('theme::theme.post.add_news')}}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

@push('footer-scripts')
    @include('components.general.discordAPI')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>

    <script>
        var clipboard = new ClipboardJS('.copy_ip')
        clipboard.on('success', function(e) {
            let elm = document.querySelector(".ip_address");
            elm.innerHTML = '{{mb_strtoupper(trans('theme::theme.hero.ip_copy'))}}';
            setTimeout(function () {
                elm.innerHTML = '{{theme_config('hero.server.ip') ?? 'play.dixept.fr'}}';
            }, 1500);
        });
    </script>

    <script src="https://platform.twitter.com/widgets.js"></script>
@endpush
