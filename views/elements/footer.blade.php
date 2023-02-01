<div class="copyright">
    <div class="container text-center text-md-start">
        <div class="row gy-3">
            <div class="col-md-6">
                <h2 class="fs-4 text-white">{{theme_config('footer.left.title') ?? 'A propos'}}</h2>
                <p class="m-0 text-white-50 me-md-3">
                    {{theme_config('footer.left.paragraph') ?? 'orem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, neque orem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, neque?'}}
                </p>
            </div>
            <div class="col-md-3">
                <h2 class="fs-4 text-white">{{theme_config('footer.middle.title') ?? 'Liens utiles'}}</h2>
                <ul class="list-unstyled m-0 text-white-50">
                    @if(theme_config('footer.center.link'))
                        @foreach(theme_config('footer.center.link') as $link)
                            <li class="py-1"><a class="text-white opacity-50 text-decoration-none" href="{{$link['url'] ?? '#'}}"><i class="{{$link['icon'] ?? 'bi bi-house'}} me-2"></i>{{$link['text'] ?? 'Accueil'}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-md-3 d-flex flex-column">
                <h2 class="fs-4 text-white">{{theme_config('footer.right.title') ?? 'Nous soutenir'}}</h2>
                <p class="text-white-50">
                    {{theme_config('footer.right.paragraph') ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, neque?'}}
                </p>
                <div>
                    <a href="{{theme_config('footer.right.url') ?? '/shop'}}" class="btn btn-primary">{{theme_config('footer.right.text') ?? 'Boutique'}}</a>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <ul class="list-unstyled d-flex align-items-center justify-content-center m-0">
                @foreach(social_links() as $link)
                    <li>
                        <a href="{{ $link->value }}" title="{{ $link->title }}" target="_blank" rel="noopener noreferrer"
                       data-bs-toggle="tooltip"
                       class="d-inline-block mx-1 px-2 rounded-circle">
                        <i class="{{ $link->icon }} text-white-50"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="text-center text-white-50">
            <p class="m-0">{{ setting('copyright') }} | <span title="Version {{$version_theme['version']}}">{{trans('theme::theme.footer.copyright')}} <a  href="https://discord.gg/Gh2yBxUWvV" target="_blank" rel="noopener noreferrer">Dixept</a>.</span> | @lang('messages.copyright') </p>
        </div>
    </div>
</div>
