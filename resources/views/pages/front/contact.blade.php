@extends("layouts.appFront")

@section("title", "Contact Me | zakialawi")
@section("meta_description", "Contact Me of zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "Contact Me | zakialawi.my.id")
@section("og_description", "Contact Me of zakialawi.my.id website")

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <!-- NAVBAR -->
    @include("components.front.navbar")

    <main id="post-content"class="w-full">

        <section>


            <iframe allow="geolocation; microphone; camera" allowfullscreen="true" allowtransparency="true" frameborder="0" id="JotFormIFrame-201751932721451" onload="window.parent.scrollTo(0,0)" scrolling="no" src="https://form.jotform.com/201751932721451" style="border: none; height: 539px; min-width: 100%;"
                title=" Contact Us Form">
            </iframe>
            <script type="text/javascript">
                var ifr = document.getElementById("JotFormIFrame-201751932721451");
                if (window.location.href && window.location.href.indexOf("?") > -1) {
                    var get = window.location.href.substr(window.location.href.indexOf("?") + 1);
                    if (ifr && get.length > 0) {
                        var src = ifr.src;
                        src = src.indexOf("?") > -1 ? src + "&" + get : src + "?" + get;
                        ifr.src = src;
                    }
                }
                window.handleIFrameMessage = function(e) {
                    if (typeof e.data === 'object') {
                        return;
                    }
                    var args = e.data.split(":");
                    if (args.length > 2) {
                        iframe = document.getElementById("JotFormIFrame-" + args[(args.length - 1)]);
                    } else {
                        iframe = document.getElementById("JotFormIFrame");
                    }
                    if (!iframe) {
                        return;
                    }
                    switch (args[0]) {
                        case "scrollIntoView":
                            iframe.scrollIntoView();
                            break;
                        case "setHeight":
                            iframe.style.height = args[1] + "px";
                            break;
                        case "collapseErrorPage":
                            if (iframe.clientHeight > window.innerHeight) {
                                iframe.style.height = window.innerHeight + "px";
                            }
                            break;
                        case "reloadPage":
                            window.location.reload();
                            break;
                        case "loadScript":
                            var src = args[1];
                            if (args.length > 3) {
                                src = args[1] + ':' + args[2];
                            }
                            var script = document.createElement('script');
                            script.src = src;
                            script.type = 'text/javascript';
                            document.body.appendChild(script);
                            break;
                        case "exitFullscreen":
                            if (window.document.exitFullscreen) window.document.exitFullscreen();
                            else if (window.document.mozCancelFullScreen) window.document.mozCancelFullScreen();
                            else if (window.document.mozCancelFullscreen) window.document.mozCancelFullScreen();
                            else if (window.document.webkitExitFullscreen) window.document.webkitExitFullscreen();
                            else if (window.document.msExitFullscreen) window.document.msExitFullscreen();
                            break;
                    }
                    var isJotForm = (e.origin.indexOf("jotform") > -1) ? true : false;
                    if (isJotForm && "contentWindow" in iframe && "postMessage" in iframe.contentWindow) {
                        var urls = {
                            "docurl": encodeURIComponent(document.URL),
                            "referrer": encodeURIComponent(document.referrer)
                        };
                        iframe.contentWindow.postMessage(JSON.stringify({
                            "type": "urls",
                            "value": urls
                        }), "*");
                    }
                };
                if (window.addEventListener) {
                    window.addEventListener("message", handleIFrameMessage, false);
                } else if (window.attachEvent) {
                    window.attachEvent("onmessage", handleIFrameMessage);
                }
            </script>

        </section>

    </main>

    <!-- Footer -->
    @include("components.front.footer")
@endsection

@push("javascript")
    {{-- code here --}}
@endpush
