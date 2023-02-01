<fieldset class="d-flex flex-column gap-3 border p-2 w-100">
    <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.left')}}</legend>
    <div class=" w-100">
        <label class="form-label m-0" for="footer-left-title">{{trans('theme::admin.title')}}</label>
        <input type="text" class="form-control @error('footer-left-title') is-invalid @enderror" title="footer-left-title" name="footer[left][title]" value="{{old('footer-left-title', config('theme.footer.left.title'))}}" aria-describedby="footer-left-title-Label">
        @error('footer-left-title')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class=" w-100">
        <label class="form-label m-0" for="footer-left-paragraph">{{trans('theme::admin.paragraph')}}</label>
        <textarea type="textaera" class="form-control @error('footer-left-paragraph') is-invalid @enderror" id="footer-left-paragraph" name="footer[left][paragraph]" aria-describedby="whatsAdventure-footer4-text-Label">{{old('footer-left-paragraph', config('theme.footer.left.paragraph'))}}</textarea>
        @error('footer-left-paragraph')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</fieldset>
<fieldset class="d-flex flex-column gap-3 border p-2 w-100">
    <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.middle')}}</legend>
    <div id="addFooterLink">
        @if(null != config('theme.footer.center.link'))
            @foreach(config('theme.footer.center.link') as $key=>$link)
                @include('admin.forms.linkInput', ['id' => 'footer[center][link]['.$key.']', 'i' => $loop->iteration])
            @endforeach
        @endif
    </div>
    <a onclick="addFields(this, 'addFooterLink', 'footer[center][link]')" class="btn btn-success">{{trans('theme::admin.add')}} <i class="bi bi-plus-circle"></i></a>
</fieldset>
<fieldset class="d-flex flex-column gap-3 border p-2 w-100">
    <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.right')}}</legend>
    <div class=" w-100">
        <label class="form-label m-0" for="footer-right-title">{{trans('theme::admin.title')}}</label>
        <input type="text" class="form-control @error('footer-right-title') is-invalid @enderror" title="footer-right-title" name="footer[right][title]" value="{{old('footer-right-title', config('theme.footer.right.title'))}}" aria-describedby="footer-right-title-Label">
        @error('footer-right-title')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class=" w-100">
        <label class="form-label m-0" for="footer-right-paragraph">{{trans('theme::admin.paragraph')}}</label>
        <textarea type="textaera" class="form-control @error('footer-right-paragraph') is-invalid @enderror" id="footer-right-text" name="footer[right][paragraph]" aria-describedby="whatsAdventure-footer4-text-Label">{{old('footer-right-paragraph', config('theme.footer.right.paragraph'))}}</textarea>
        @error('footer-right-paragraph')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <fieldset class="d-flex flex-column gap-3 border p-2 w-100">
        <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.button')}}</legend>
        <div class="form-group">
            <label class="form-label m-0" for="footer-right-url">{{trans('theme::admin.url')}}</label>
            <input type="text" class="form-control @error('footer-right-url') is-invalid @enderror" title="footer-right-url" name="footer[right][url]" value="{{old('footer-right-url', config('theme.footer.right.url'))}}" aria-describedby="footer-right-url-Label">
            @error('footer-right-url')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label m-0" for="footer-right-text">{{trans('theme::admin.text')}}</label>
            <input type="text" class="form-control @error('footer-right-text') is-invalid @enderror" title="footer-right-text" name="footer[right][text]" value="{{old('footer-right-text', config('theme.footer.right.text'))}}" aria-describedby="footer-right-text-Label">
            @error('footer-right-text')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </fieldset>
</fieldset>
@push('footer-scripts')
<script>
    function addFields(e, inputId, id){
        let div = document.getElementById(inputId);
        let i = (null != div.lastElementChild ? parseInt(div.lastElementChild.getElementsByTagName('input')[0].id.replace(/[^0-9]/g,""))+1:1);

        div.innerHTML += `
                @include('admin.forms.linkInput', ['id' => '${id}[${i}]'])
        `;
    }
    /* dixept */
    function deleteField(e){ e.parentElement.remove(); }
</script>
@endpush
