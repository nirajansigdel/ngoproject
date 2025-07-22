<head>
    <?php
    use App\Models\Favicon;
    $favicon = Favicon::first();
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>umbrella organization nepal</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @if($favicon)
        <link rel="icon" type="image/png" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/' . $favicon->apple_touch_icon) }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/favicon/' . $favicon->favicon_thirtyTwo) }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/favicon/' . $favicon->favicon_sixteen) }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}">
        @if($favicon->file)
            <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->file) }}">
        @endif
        @if($favicon->site_webmanifest)
            <link rel="manifest" href="{{ asset('uploads/favicon/file' . $favicon->site_webmanifest) }}">
        @endif
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @endif
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>







