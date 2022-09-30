@php
header('Accept-Encoding: gzip, compress, br');
$nonce = $_COOKIE['hash'];

@endphp
<title>@yield('title', config('app.name'))</title>
<meta property="og:title" content="Boxeon.com Monthly African Food Subscription Box" />
<meta property="og:description" content="African store online, Shop African food online, African snacks" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://boxeon.com" />
<meta property="og:image" content="{{ asset('../assets/images/high-five.jpg') }}">
<meta name="description"
    content="Boxeon makes it easy for the African diapora to buy African foods from home. Shop West African foods and snacks." />
<meta name="keywords" content="Boxeon, buy black, subscription box, African foods, Nigerian Foods, Jollof Rice, Fufu">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" type="image/svg+xml" href="{{ asset('../assets/images/favicon.webp') }}">
<link rel="alternate icon" href="{{ asset('../assets/images/favicon.webp') }}">
<link rel="mask-icon" href="https://boxeon.com/images/favicon.webp" color="#fff">
<link rel="stylesheet" href="{{ asset('../assets/css/style.css?v=37') }}">
<link rel="stylesheet" href="{{ asset('../assets/css/forms.css?v=35') }}">
<link defer rel="stylesheet" href="{{ asset('../css/app.css') }}">
<link rel="stylesheet" media="screen and (min-width: 200px) and (max-width: 1810px)"
    href="{{ asset('../assets/css/mobile.css?v=3.6') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton&display=swap">
<script defer type="module" src="{{ asset('../assets/js/global.js?v=2.1') }}"></script>
<!--<script defer src="https://apis.google.com/js/platform.js?onload=onLoadCallback"></script>!-->

<style type="text/css" nonce="{{$nonce}}">
    *,
    ::before,
    ::after {
        box-sizing: border-box;
    }

    html {
        -moz-tab-size: 4;
        -o-tab-size: 4;
        tab-size: 4;
    }

    html {
        line-height: 1.15;
        /* 1 */
        -webkit-text-size-adjust: 100%;
        /* 2 */
    }

    body {
        margin: 0;
    }


    body {
        font-family:

            -apple-system,
            'Segoe UI',
            Roboto,
            Helvetica,
            Arial,
            sans-serif,
            'Apple Color Emoji',
            'Segoe UI Emoji';
    }


    hr {
        height: 0;
        /* 1 */
        color: inherit;
        /* 2 */
    }


    abbr[title] {
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted;
    }


    b,
    strong {
        font-weight: bolder;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        /* 1 */
        font-size: 100%;
        /* 1 */
        line-height: 1.15;
        /* 1 */

    }

    code,
    kbd,
    samp,
    pre {
        font-family:
            ui-monospace,
            SFMono-Regular,
            Consolas,
            'Liberation Mono',
            Menlo,
            monospace;
        font-size: 1em;

    }



    small {
        font-size: 80%;
    }


    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
    }

    sub {
        bottom: -0.25em;
    }

    sup {
        top: -0.5em;
    }

    table {
        text-indent: 0;
        /* 1 */
        border-color: inherit;
        /* 2 */
    }


    button,
    select {
        /* 1 */
        text-transform: none;
    }

    button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        -webkit-appearance: button;
    }

    ::-moz-focus-inner {
        border-style: none;
        padding: 0;
    }

    :-moz-focusring {
        outline: 1px dotted ButtonText;
    }

    :-moz-ui-invalid {
        box-shadow: none;
    }


    legend {
        padding: 0;
    }



    progress {
        vertical-align: baseline;
    }


    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
        height: auto;
    }


    [type='search'] {
        -webkit-appearance: textfield;

        outline-offset: -2px;

    }


    ::-webkit-search-decoration {
        -webkit-appearance: none;
    }


    ::-webkit-file-upload-button {
        -webkit-appearance: button;

        font: inherit;

    }

    summary {
        display: list-item;
    }


    fieldset {
        margin: 0;
        padding: 0;
    }


    html {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

        line-height: 1.5;


        *,
        ::before,
        ::after {
            box-sizing: border-box;

            border-width: 0;

            border-style: solid;

            border-color: currentColor;

        }


        hr {
            border-top-width: 1px;
        }

        img {
            border-style: solid;
        }

        textarea {
            resize: vertical;
        }

        input::-moz-placeholder,
        textarea::-moz-placeholder {
            opacity: 1;
            color: #9ca3af;
        }

        input:-ms-input-placeholder,
        textarea:-ms-input-placeholder {
            opacity: 1;
            color: #9ca3af;
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            color: #9ca3af;
        }

        input[type=text]:focus {
            border: 1px solid green;
        }

        button,
        [role="button"] {
            cursor: pointer;
        }

        :-moz-focusring {
            outline: auto;
        }

        table {
            border-collapse: collapse;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            line-height: inherit;
        }

        pre,
        code,
        kbd,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }


        [hidden] {
            display: none;
        }

        *,
        ::before,
        ::after {
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            --tw-border-opacity: 1;
            border-color: rgba(229, 231, 235, var(--tw-border-opacity));
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-ring-inset: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: green;
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-blur: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-brightness: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-contrast: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-grayscale: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-hue-rotate: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-invert: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-saturate: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-sepia: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-drop-shadow: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        [type='text'],
        [type='email'],
        [type='url'],
        [type='password'],
        [type='number'],
        [type='date'],
        [type='datetime-local'],
        [type='month'],
        [type='search'],
        [type='tel'],
        [type='time'],
        [type='week'],
        [multiple],
        textarea,
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #fff;
            font-size: 1rem;
            line-height: 1.5rem;
            --tw-shadow: 0 0 #0000;
        }

        [type='text']:focus,
        [type='email']:focus,
        [type='url']:focus,
        [type='password']:focus,
        [type='number']:focus,
        [type='date']:focus,
        [type='datetime-local']:focus,
        [type='month']:focus,
        [type='search']:focus,
        [type='tel']:focus,
        [type='time']:focus,
        [type='week']:focus,
        [multiple]:focus,
        textarea:focus,
        select:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty,
                    /*!*/
                    /*!*/
                );
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: green;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
            border-color: green;
        }
</style>
