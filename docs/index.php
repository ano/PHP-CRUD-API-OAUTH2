<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>Swagger UI</title>
    <!-- <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32" /> -->
    <!-- <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" /> -->
    <!-- <link href='css/typography.css' media='screen' rel='stylesheet' type='text/css'/> -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway');
    </style>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css' media='screen' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/2.2.10/css/screen.css' media='screen' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../../node_modules/swagger-ui-themes/themes/2.x/theme-flattop.css">
    <!-- <link href='css/reset.css' media='print' rel='stylesheet' type='text/css'/> -->
    <!-- <link href='css/print.css' media='print' rel='stylesheet' type='text/css'/> -->
    <script>
        // src='lib/object-assign-pollyfill.js'
        if (typeof Object.assign != 'function') {
            (function () {
                Object.assign = function (target) {
                    'use strict';
                    if (target === undefined || target === null) {
                        throw new TypeError('Cannot convert undefined or null to object');
                    }
                    var output = Object(target);
                    for (var index = 1; index < arguments.length; index++) {
                        var source = arguments[index];
                        if (source !== undefined && source !== null) {
                            for (var nextKey in source) {
                                if (Object.prototype.hasOwnProperty.call(source, nextKey)) {
                                    output[nextKey] = source[nextKey];
                                }
                            }
                        }
                    }
                    return output;
                };
            })();
        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery-1.8.0.min.js' type='text/javascript'></script>
    <script>
        // src='lib/jquery.slideto.min.js'
        (function (b) {
            b.fn.slideto = function (a) {
                a = b.extend({
                    slide_duration: "slow"
                    , highlight_duration: 3E3
                    , highlight: true
                    , highlight_color: "#FFFF99"
                }, a);
                return this.each(function () {
                    obj = b(this);
                    b("body").animate({
                        scrollTop: obj.offset().top
                    }, a.slide_duration, function () {
                        a.highlight && b.ui.version && obj.effect("highlight", {
                            color: a.highlight_color
                        }, a.highlight_duration)
                    })
                })
            }
        })(jQuery);
    </script>
    <script>
        // src='lib/jquery.wiggle.min.js'
        jQuery.fn.wiggle = function (o) {
            var d = {
                speed: 50
                , wiggles: 3
                , travel: 5
                , callback: null
            };
            var o = jQuery.extend(d, o);
            return this.each(function () {
                var cache = this;
                var wrap = jQuery(this).wrap('<div class="wiggle-wrap"></div>').css("position", "relative");
                var calls = 0;
                for (i = 1; i <= o.wiggles; i++) {
                    jQuery(this).animate({
                        left: "-=" + o.travel
                    }, o.speed).animate({
                        left: "+=" + o.travel * 2
                    }, o.speed * 2).animate({
                        left: "-=" + o.travel
                    }, o.speed, function () {
                        calls++;
                        if (jQuery(cache).parent().hasClass('wiggle-wrap')) {
                            jQuery(cache).parent().replaceWith(cache);
                        }
                        if (calls == o.wiggles && jQuery.isFunction(o.callback)) {
                            o.callback();
                        }
                    });
                }
            });
        };
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.ba-bbq/1.2.1/jquery.ba-bbq.min.js' type='text/javascript'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js' type='text/javascript'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash-compat/3.10.1/lodash.min.js' type='text/javascript'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js' type='text/javascript'></script>
    <script>
        // src='lib/backbone-min.js'
        // From http://stackoverflow.com/a/19431552
        // Compatibility override - Backbone 1.1 got rid of the 'options' binding
        // automatically to views in the constructor - we need to keep that.
        Backbone.View = (function (View) {
            return View.extend({
                constructor: function (options) {
                    this.options = options || {};
                    View.apply(this, arguments);
                }
            });
        })(Backbone.View);
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/2.2.10/swagger-ui.min.js' type='text/javascript'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/highlight.min.js' type='text/javascript'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/languages/json.min.js' type='text/javascript'></script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/languages/xml.min.js' type='text/javascript'></script> -->
    <!-- <script src='lib/highlight.9.1.0.pack_extended.js' type='text/javascript'></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/json-editor/0.7.28/jsoneditor.min.js' type='text/javascript'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.6/marked.min.js' type='text/javascript'></script>
    <!-- <script src='lib/swagger-oauth.js' type='text/javascript'></script> -->
    <!-- Some basic translations -->
    <!-- <script src='lang/translator.js' type='text/javascript'></script> -->
    <!-- <script src='lang/ru.js' type='text/javascript'></script> -->
    <!-- <script src='lang/en.js' type='text/javascript'></script> -->
    <script type="text/javascript">
        $(function () {
            var url = window.location.search.match(/url=([^&]+)/);
            if (url && url.length > 1) {
                url = decodeURIComponent(url[1]);
            }
            else {
                url = "../index.php";
            }
            hljs.configure({
                highlightSizeThreshold: 5000
            });
            // // Pre load translate...
            // if(window.SwaggerTranslator) {
            //   window.SwaggerTranslator.translate();
            // }
            window.swaggerUi = new SwaggerUi({
                url: url
                , dom_id: "swagger-ui-container"
                , supportedSubmitMethods: ['get', 'post', 'put', 'delete', 'patch']
                , onComplete: function (swaggerApi, swaggerUi) {
                    // if(typeof initOAuth == "function") {
                    //   initOAuth({
                    //     clientId: "your-client-id",
                    //     clientSecret: "your-client-secret-if-required",
                    //     realm: "your-realms",
                    //     appName: "your-app-name",
                    //     scopeSeparator: " ",
                    //     additionalQueryStringParams: {}
                    //   });
                    // }
                    //
                    // if(window.SwaggerTranslator) {
                    //   window.SwaggerTranslator.translate();
                    // }
                }
                , onFailure: function (data) {
                    log("Unable to Load SwaggerUI");
                }
                , docExpansion: "none"
                , jsonEditor: false
                , defaultModelRendering: 'schema'
                , showRequestHeaders: false
                , showOperationIds: false
            });
            window.swaggerUi.load();

            function log() {
                if ('console' in window) {
                    console.log.apply(console, arguments);
                }
            }
        });
    </script>
</head>

<body class="swagger-section">
    <div id='header'>
        <div class="swagger-ui-wrap">
            <a id="logo" href="http://swagger.io"><img class="logo__img" alt="swagger" height="30" width="30" src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/2.2.10/images/logo_small.png" /><span class="logo__title">swagger</span></a>
            <form id='api_selector'>
                <div class='input'>
                    <input placeholder="http://example.com/api" id="input_baseUrl" name="baseUrl" type="text" /> </div>
                <div id='auth_container'></div>
                <div class='input'><a id="explore" class="header__btn" href="#" data-sw-translate>Explore</a></div>
            </form>
        </div>
    </div>
    <div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>
    <div id="swagger-ui-container" class="swagger-ui-wrap"></div>
    <style>
        /* latin-ext */
        
        .info_title,
        a.toggleEndpointList {
            text-transform: capitalize;
        }
        
        input#input_baseUrl {
            display: none;
        }
        
        body {
            font-family: 'Raleway' !important;
            line-height: 1;
            color: #272822;
            background-color: #efefef;
        }
        
        div#swagger-ui-container {
            font-family: 'Raleway' !important;
        }
        
        ul#resources {
            padding: 2em;
            background-color: #fff;
            border: 2px solid #cecece;
            font-family: 'Raleway' !important;
        }
        
        .swagger-section #header {
            background-color: #272822;
            padding: 9px 14px 19px 14px;
            height: 23px;
            min-width: 775px;
        }
        
        .swagger-section .swagger-ui-wrap ul#resources li.resource div.heading h2 a {
            color: #1FA79B;
        }
        
        .swagger-section .swagger-ui-wrap ul#resources li.resource div.heading h2 a:hover {
            color: #17273D;
        }
        .swagger-section .swagger-ui-wrap ul#resources li.resource ul.endpoints li.endpoint ul.operations li.operation.get div.heading h3 span.http_method a {
            background-color: #0067A3;
        }
    </style>
</body>

</html>