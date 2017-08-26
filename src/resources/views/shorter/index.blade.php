@extends('shorter::layout.shorter')

@section('title', 'Generator shorten URL link')

@push('style')
    <link rel="stylesheet" href="{{ url('/vendor/shorter/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush

@section('content')
    <div id="app">
        <div class="header">
            <h1>Generator shorten URL link</h1>
        </div>
        <div class="form-wrapper">
            <form class="short-url-form">
                {{ csrf_field() }}
                <div class="input">
                    <input type="text" autocomplete="off" name="url" id="url" autofocus placeholder="Enter URL. Example: [http|https|ftp]://example.com/*">
                </div>
                <div class="input">
                    <input type="text" autocomplete="off" name="short-url" id="short-url" autofocus placeholder="Here appear short URL">
                    <a href="#" class="copy-to-clipboard" title="Copy to clipboard" data-clipboard-target="#short-url">COPY</a>
                </div>
                <div class="button">
                    <button type="submit">Create short URL</button>
                </div>
            </form>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        var Route = {
            'api.shorter.generate': '{{ route('api.shorter.generate') }}',
            'shorter.redirect': '{{ route('shorter.redirect') }}'
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.1/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
    <script src="{{ url('/vendor/shorter/js/app.js') }}"></script>
@endpush