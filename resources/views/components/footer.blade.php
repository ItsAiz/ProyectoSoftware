@section('footerStyles')
    <style>
        body {
            background: #D0D8DB;
            padding-top: 60px;
            padding-bottom: 40px;
        }

        textarea {
            resize: none;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            white-space: nowrap;
        }

        .svg-inline--fa {
            vertical-align: -0.200em;
        }

        .rounded-social-buttons {
            text-align: center;
        }

        .rounded-social-buttons .social-button {
            display: inline-block;
            position: relative;
            cursor: pointer;
            width: 3.125rem;
            height: 3.125rem;
            border: 0.125rem solid transparent;
            padding: 0;
            text-decoration: none;
            text-align: center;
            color: #fefefe;
            font-size: 1.5625rem;
            font-weight: normal;
            line-height: 2em;
            border-radius: 1.6875rem;
            transition: all 0.5s ease;
            margin-right: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .rounded-social-buttons .social-button:hover, .rounded-social-buttons .social-button:focus {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .rounded-social-buttons .fa-twitter, .fa-facebook-f, .fa-linkedin, .fa-youtube, .fa-instagram {
            font-size: 25px;
        }

        .rounded-social-buttons .social-button.facebook {
            background: #3b5998;
        }

        .rounded-social-buttons .social-button.facebook:hover, .rounded-social-buttons .social-button.facebook:focus {
            color: #3b5998;
            background: #fefefe;
            border-color: #3b5998;
        }

        .rounded-social-buttons .social-button.twitter {
            background: #55acee;
        }

        .rounded-social-buttons .social-button.twitter:hover, .rounded-social-buttons .social-button.twitter:focus {
            color: #55acee;
            background: #fefefe;
            border-color: #55acee;
        }

        .rounded-social-buttons .social-button.youtube {
            background: #bb0000;
        }

        .rounded-social-buttons .social-button.youtube:hover, .rounded-social-buttons .social-button.youtube:focus {
            color: #bb0000;
            background: #fefefe;
            border-color: #bb0000;
        }

        .rounded-social-buttons .social-button.instagram {
            background: #125688;
        }

        .rounded-social-buttons .social-button.instagram:hover, .rounded-social-buttons .social-button.instagram:focus {
            color: #125688;
            background: #fefefe;
            border-color: #125688;
        }
    </style>
@endsection
<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted" style=" left: 0; bottom: 0; width: 100%">
    <div class="container-fluid">
        <div class="row"> <br></div>
        <div class="row">
            <div class="col">
                <p class="text-white text-center" style="font-size: medium">What is Lorem Ipsum?
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </div>
            <div class="col" >
                <div class="row">
                    <div class="col">
                        <div class="rounded-social-buttons text-center">
                            <a class="social-button facebook" style="font-size: larger"href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="rounded-social-buttons text-center">
                            <a class="social-button twitter" style="font-size: larger" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="rounded-social-buttons text-center">
                            <a class="social-button youtube" style="font-size: larger" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="rounded-social-buttons text-center">
                            <a class="social-button instagram" style="font-size: larger" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <p class="text-white text-center"  style="font-size: medium">What is Lorem Ipsum?
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2022 Copyright:
                    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">11&6 GASTRO PUB</a>
                </div>
            </div>
            <div class="column"></div>
        </div>
    </div>
</footer>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>


