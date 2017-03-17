<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @include ('elements.style-on-head')
    @yield('custom-style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include ('elements.header')
        @include ('elements.navigation')
        <div class="content-wrapper">
        @yield('flashMessage')
            @if (session('flashMessage'))
                <section id="flashMessage">
                    <div class="alert alert-{{session('flashMessage')['status']}}" style="margin-bottom: 0;">
                        <span>{{session('flashMessage')['message']}}</span>
                        <i class="fa fa-close close-msg"></i>
                    </div>
                </section>
            @endif
            <section class="content-header">
                <h1>@yield('title')</h1>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include ('elements.footer')
        @include ('elements.right-side-setting')
    </div>
    @include ('elements.script-below-body')
    @yield('custom-script')
</body>

</html>
