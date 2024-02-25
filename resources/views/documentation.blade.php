<!DOCTYPE html>
<html lang="en">
<head>
    <title> cheap&best</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->
    <script defer src="assets/fontawesome/js/all.js"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/prism/prism.css">
    <link rel="stylesheet" href="assets/plugins/elegant_font/css/style.css">
    <link rel="stylesheet" href="assets/plugins/simplelightbox/simple-lightbox.min.css">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">

</head>

<body class="body-green">
    <div class="page-wrapper">
        <!-- ******Header****** -->
        <header id="header" class="header">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <a href="index.html">
                            <span aria-hidden="true" class="icon_documents_alt icon"></span>
                            <span class="text-highlight"> cheap&best</span><span class="text-bold">Docs</span>
                        </a>
                    </h1>

                </div><!--//branding-->





            </div><!--//container-->
        </header><!--//header-->
        <div class="doc-wrapper">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title"><i class="icon fa fa-paper-plane"></i> cheap&best</h1>
                </div><!--//doc-header-->
                <div class="doc-body row">
                    <div class="doc-content col-md-9 col-12 order-1">
                        <div class="content-inner">


                            <section id="code-section" class="doc-section">
                                <h2 class="section-title">Code</h2>
                                <div class="section-block">
                                    <p>
                                        The best way to send WhatsApp messages using software applications
                                    </p>

                                    <h3>Your token :{{ Auth::guard('web')->user()->token ?? " " }}</h3>

                                </div><!--//section-block-->
                                <div id="Text" class="section-block">


                                    <div class="code-block">
                                        <h6>PHP Curl</h6>
                                        <pre><code class="language-css">
$response = Http::withHeaders([
    'Content-Type' => 'application/json'
])->post(
{{env('APP_URL')}}/api/send_massages    ,
    [
        'number' => "0501111111",
        'body' => 'Message content',
        'token' => "Put token your"
    ]
);
</code></pre>
<img src="{{ asset('storage/image/111.PNG') }}" alt="" srcset="">

                                    </div>

                                    <!--//code-block-->
                                </div><!--//section-block-->

                                <div id="Images" class="section-block">
                                    <div class="code-block">
                                        <h6>PHP Curl</h6>
                                        <pre><code class="language-css">
    $response = Http::withHeaders([
    'Content-Type' => 'application/json'
])->post(
    {{env('APP_URL')}}/api/send_massages
    ,
    [
        'number' => "0501111111",
        'body' => 'Message content',
        'url' => 'https://s3-eu-west-1.amazonaws.com/moyasar.api.assets.prod/images/visa-master.mp4',
        'type' => 'image',
        'token' => "Put token your"

    ]
);
                                        </code></pre>
                                        <img src="{{ asset('storage/image/1.PNG') }}" alt="" srcset="">

                                    </div><!--//code-block-->

                                </div><!--//section-block-->
                                <div id="Video" class="section-block">
                                    <div class="code-block">
                                        <h6>PHP Curl</h6>
                                        <pre><code class="language-css">
    $response = Http::withHeaders([
    'Content-Type' => 'application/json'
])->post(
    {{env('APP_URL')}}/api/send_massages
    ,
    [
        'number' => "0501111111",
        'body' => 'Message content',
        'url' => 'https://s3-eu-west-1.amazonaws.com/moyasar.api.assets.prod/images/visa-master.mp4',
        'type' => 'video',
        'token' => "Put token your"
    ]
);

                                        </code></pre>
                                        <img src="{{ asset('storage/image/mp4.PNG') }}" alt="" srcset="">

                                    </div><!--//code-block-->

                                </div><!--//section-block-->


                            </section><!--//doc-section-->



                            {{-- <section id="video-section" class="doc-section">
                                <h2 class="section-title">Video</h2>
                                <div class="section-block">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <h6>Responsive Video 16:9</h6>
                                            <!-- 16:9 aspect ratio -->
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.youtube.com/embed/ejBkOjEG6F0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <h6>Responsive Video 4:3</h6>
                                            <!-- 4:3 aspect ratio -->
                                            <div class="ratio ratio-4x3">
                                                <iframe src="https://www.youtube.com/embed/ejBkOjEG6F0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div><!--//row-->
                                </div><!--//section-block-->

                            </section><!--//doc-section--> --}}
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                    <div class="doc-sidebar col-md-3 col-12 order-0 d-none d-md-flex">
                        <div id="doc-nav" class="doc-nav">
	                            <nav id="doc-menu" class="nav doc-menu flex-column sticky">


                                    <li class="nav-item">
	                                    <a class="nav-link scrollto" href="#code-section">Send Text Massage</a>
                                    </li>

                                    <nav class="nav doc-sub-menu nav flex-column">
	                                    <li class="nav-item">
                                            <a class="nav-link scrollto" href="#Text">Send Text</a>
	                                    </li>
	                                    <li class="nav-item">
                                            <a class="nav-link scrollto" href="#Images">Send Images</a>
	                                    </li>
	                                    <li class="nav-item">
                                            <a class="nav-link scrollto" href="#Video">Send Video</a>
	                                    </li>


                                    </nav><!--//nav-->

	                            </nav><!--//doc-menu-->

                        </div>
                    </div><!--//doc-sidebar-->
                </div><!--//doc-body-->
            </div><!--//container-->
        </div><!--//doc-wrapper-->



    </div><!--//page-wrapper-->



    <!-- Main Javascript -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/prism/prism.js"></script>
    <script src="assets/plugins/stickyfill/dist/stickyfill.min.js"></script>
    <script src="assets/plugins/gumshoe/gumshoe.polyfills.min.js"></script>
    <script src="assets/plugins/simplelightbox/simple-lightbox.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>

