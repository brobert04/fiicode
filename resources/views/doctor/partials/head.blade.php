<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('../assets/favicon.ico') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('../assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('../assets/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @yield('custom-css')
    <style>
        @import 'https://fonts.googleapis.com/css?family=Noto+Sans';

        * {
            box-sizing: border-box;
        }

        .floating-chat {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: fixed;
            bottom: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
            transform: translateY(70px);
            transition: all 250ms ease-out;
            border-radius: 50%;
            opacity: 0;
            background: rgb(25, 119, 204);
            background: linear-gradient(180deg, rgba(25, 119, 204, 1) 100%, rgba(255, 255, 255, 1) 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .floating-chat.enter:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            opacity: 1;
        }

        .floating-chat.enter {
            transform: translateY(0);
            opacity: 0.6;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.12), 0px 1px 2px rgba(0, 0, 0, 0.14);
        }

        .floating-chat.expand {
            width: 300px;
            max-height: 400px;
            height: 400px;
            border-radius: 5px;
            cursor: auto;
            opacity: 1;
        }

        .floating-chat :focus {
            outline: 0;
            box-shadow: 0 0 3pt 2pt rgba(42, 82, 212, 0.3);
        }

        .floating-chat button {
            background: transparent;
            border: 0;
            color: white;
            text-transform: uppercase;
            border-radius: 3px;
            cursor: pointer;
        }

        .floating-chat .chat {
            display: flex;
            flex-direction: column;
            position: absolute;
            opacity: 0;
            width: 1px;
            height: 1px;
            border-radius: 50%;
            transition: all 250ms ease-out;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .floating-chat .chat.enter {
            opacity: 1;
            border-radius: 0;
            margin: 10px;
            width: auto;
            height: auto;
        }

        .floating-chat .chat .header {
            flex-shrink: 0;
            padding-bottom: 10px;
            display: flex;
            background: transparent;
        }

        .floating-chat .chat .header .title {
            flex-grow: 1;
            flex-shrink: 1;
            padding: 0 5px;
        }

        .floating-chat .chat .header button {
            flex-shrink: 0;
        }

        .floating-chat .chat .messages {
            padding: 10px;
            margin: 0;
            list-style: none;
            overflow-y: scroll;
            overflow-x: hidden;
            flex-grow: 1;
            border-radius: 4px;
            background: transparent;
        }

        .floating-chat .chat .messages::-webkit-scrollbar {
            width: 5px;
        }

        .floating-chat .chat .messages::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: rgba(25, 147, 147, 0.1);
        }

        .floating-chat .chat .messages::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-color: rgba(25, 147, 147, 0.2);
        }

        .floating-chat .chat .messages li {
            position: relative;
            clear: both;
            display: inline-block;
            padding: 14px;
            margin: 0 0 20px 0;
            font: 12px/16px 'Noto Sans', sans-serif;
            border-radius: 10px;
            background-color: rgba(14, 14, 168, 0.2);
            word-wrap: break-word;
            max-width: 81%;
        }

        .floating-chat .chat .messages li:before {
            position: absolute;
            top: 0;
            width: 25px;
            height: 25px;
            border-radius: 25px;
            content: '';
            background-size: cover;
        }

        .floating-chat .chat .messages li:after {
            position: absolute;
            top: 10px;
            content: '';
            width: 0;
            height: 0;
            border-top: 10px solid rgba(25, 147, 147, 0.2);
        }

        .floating-chat .chat .messages li.other {
            animation: show-chat-odd 0.15s 1 ease-in;
            -moz-animation: show-chat-odd 0.15s 1 ease-in;
            -webkit-animation: show-chat-odd 0.15s 1 ease-in;
            float: right;
            margin-right: 45px;
            color: white;
        }

        .floating-chat .chat .messages li.other:before {
            right: -45px;
            background-image: url(https://github.com/chatbot.png);
        }

        .floating-chat .chat .messages li.other:after {
            border-right: 10px solid transparent;
            right: -10px;
        }

        .floating-chat .chat .messages li.self {
            animation: show-chat-even 0.15s 1 ease-in;
            -moz-animation: show-chat-even 0.15s 1 ease-in;
            -webkit-animation: show-chat-even 0.15s 1 ease-in;
            float: left;
            margin-left: 45px;
            color: white;
        }

        .floating-chat .chat .messages li.self:before {
            left: -45px;
            background-image: url("https://ui-avatars.com/api/?name={{ auth()->user()->name }}");
        }

        .floating-chat .chat .messages li.self:after {
            border-left: 10px solid transparent;
            left: -10px;
        }

        .floating-chat .chat .footer {
            flex-shrink: 0;
            display: flex;
            padding-top: 10px;
            max-height: 90px;
            background: transparent;
        }

        .floating-chat .chat .footer .text-box {
            border-radius: 3px;
            background: rgba(14, 14, 168, 0.2);
            min-height: 100%;
            width: 100%;
            margin-right: 5px;
            color: white;
            overflow-y: auto;
            padding: 2px 5px;
        }

        .floating-chat .chat .footer .text-box::-webkit-scrollbar {
            width: 5px;
        }

        .floating-chat .chat .footer .text-box::-webkit-scrollbar-track {
            border-radius: 5px;
            background-color: rgba(25, 147, 147, 0.1);
        }

        .floating-chat .chat .footer .text-box::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-color: rgba(25, 147, 147, 0.2);
        }

        @keyframes show-chat-even {
            0% {
                margin-left: -480px;
            }

            100% {
                margin-left: 0;
            }
        }

        @-moz-keyframes show-chat-even {
            0% {
                margin-left: -480px;
            }

            100% {
                margin-left: 0;
            }
        }

        @-webkit-keyframes show-chat-even {
            0% {
                margin-left: -480px;
            }

            100% {
                margin-left: 0;
            }
        }

        @keyframes show-chat-odd {
            0% {
                margin-right: -480px;
            }

            100% {
                margin-right: 0;
            }
        }

        @-moz-keyframes show-chat-odd {
            0% {
                margin-right: -480px;
            }

            100% {
                margin-right: 0;
            }
        }

        @-webkit-keyframes show-chat-odd {
            0% {
                margin-right: -480px;
            }

            100% {
                margin-right: 0;
            }
        }
    </style>
</head>
