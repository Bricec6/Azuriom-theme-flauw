@extends('layouts.base')

@section('title', trans('messages.home'))

@section('app')
    <div class="home-background d-flex align-items-center justify-content-end flex-column text-white pb-md-15 pb-3 " style="background: rgb(87,110,247);background: radial-gradient(circle, rgba(87,110,247,0) 6%, rgba(var(--bs-black-rgb),0.6) 98%),linear-gradient(rgba(18,23,37,0.79), rgba(var(--bs-light-rgb),0.8)),url('{{ setting('background') ? image_url(setting('background')) : 'https://via.placeholder.com/2000x500' }}') no-repeat center; background-size: cover">

        <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-md-4">
            <div data-clipboard-text="{{theme_config('hero.server.ip') ?? 'play.dixept.fr'}}" class="copy_ip hero-small-box d-flex align-items-center gap-3 bg-dark bg-opacity-25 p-3" style="cursor : pointer;">
                <div>
                    <h2 class="m-0 fs-5 server_count">
                        @forelse($servers->where('home_display') as $server)
                            @if($server->isOnline())
                                <span class="server_count_span">{{$server->getOnlinePlayers()}}</span> {{theme_config('hero.server.text') ?? 'PLAYERS ONLINE'}}
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
                <div>
                    <h2 class="m-0 fs-5 discord-list_count"><span>{{theme_config('hero.discord.text') ?? 'UTILISATEURS EN LIGNE'}}</span></h2>
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
                        <div class="d-flex flex-column text-md-start text-center py-3" style="overflow-wrap: anywhere;">
                            <h2 class="m-0 fw-bold fs-4">{{theme_config('event.box.title') ?? 'ÉVENEMENT:'}}</h2>{{theme_config('event.box.paragraph') ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam animi deleniti distinctio dolor doloribus eos esse, maiores pariatur sint?'}}
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
                        @if(theme_config('block.discord.type') == 'custom')
                            <div class="text-center mx-2">
                                <h2 class="fs-3 mb-3 text-uppercase">{{trans('theme::admin.discord')}}</h2>
                                <div class="bg-dark rounded-3" style="border-radius: 12px;">
                                    @include('components.general.discord')
                                </div>
                                <hr>
                            </div>
                        @else
                            <div class="text-center mx-2 mb-2">
                                <iframe height="400" width="100%" src="https://discordapp.com/widget?id={{theme_config('block.discord.id') ?? '1025845189115400303'}}&theme={{theme_config('block.discord.theme') ?? 'dark'}}"></iframe>
                            </div>
                        @endif
                    @endif
                    @if(!theme_config('block.twitter.toggle'))
                    <div class="text-center mx-2">
                        <h2 class="fs-3 text-uppercase">{{trans('theme::admin.twitter')}}</h2>
                        <div>
                            @include('components.general.twitter', ['limit' => theme_config('block.twitter.amount') ?? 3, 'theme' => theme_config('block.twitter.theme') ?? 'dark'])
                        </div>
                        <hr>
                    </div>
                    @endif
                </div>
                <div class="col-md-9 p-0">
                    @if(! $posts->isEmpty())
                        <div class="bg-dark text-center py-3 border-bottom-0 rounded-end">
                            <h2 class="m-0 text-white text-uppercase">{{theme_config('block.news.title') ?? trans('messages.news') }}</h2>
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
    @if(theme_config('block.discord.type') == 'custom')
        @include('components.general.discordAPI')
    @endif

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
