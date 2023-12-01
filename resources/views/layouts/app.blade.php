
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME','Laravel')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.css">
    <link rel="stylesheet" href="https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/_vendor/prismjs/themes/prism-okaidia.css">
    <link rel="stylesheet" href="https://bootswatch.com/_assets/css/custom.min.css">
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KGDJBEFF3W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-KGDJBEFF3W');
    </script>
</head>
<body>
<div class="navbar navbar-expand-lg fixed-top bg-primary" data-bs-theme="dark">
    <div class="container">
        <a href="#" class="navbar-brand">{{env('APP_NAME','Laravel')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.list')}}">Products List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.import')}}">Products Import</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Success!</h4>
            <p class="mb-0">{{session()->get('success')}}</p>
        </div>
    @elseif(session()->has('errors'))
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            @if(isset($errors))
                {!! implode('', $errors->all('<p>:message</p>')) !!}
            @else
                @foreach(session()->get('errors') as $error)
                    <span>{{$error}}</span><br/>
                @endforeach
            @endif
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Error!</h4>
            <p class="mb-0">{{session()->get('error')}}</p>
        </div>
    @endif
    @yield('content')
</div>

<script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://bootswatch.com/_vendor/prismjs/prism.js" data-manual></script>
<script src="https://bootswatch.com/_assets/js/custom.js"></script>
</body>
</html>
