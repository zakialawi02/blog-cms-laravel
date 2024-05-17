<footer id="footer" class="flex items-end justify-center">
    <div class="w-full">
        <div class="px-1 py-16">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 gap-6 xl:grid-cols-6 md:grid-cols-4">
                    <div class="md:col-span-2">
                        <a class="block mb-6 navbar-brand" href="{{ route("article.index") }}">
                            <h2 class="text-3xl font-bold text-primary">Zakialawi Blog</h2>
                        </a>
                        <p class="max-w-xs text-base font-medium text-muted">Personal Blog & platform</p>

                        <h3 class="mt-5 text-xl font-bold text-dark">Follow Us:</h3>
                        <div class="flex gap-3 mt-4 font-normal text-dark">
                            <a href="#" class="flex items-center justify-center w-10 h-10 text-xl transition-all duration-500 bg-transparent border border-gray-300 rounded-md hover:border-primary hover:bg-primary hover:text-light"><i class="ri-facebook-fill" target="_blank"></i>
                            </a>
                            <a href="https://twitter.com/zakialawi_" class="flex items-center justify-center w-10 h-10 text-xl transition-all duration-500 bg-transparent border border-gray-300 rounded-md hover:border-primary hover:bg-primary hover:text-light" target="_blank"><i
                                    class="ri-twitter-x-fill"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/ahmad-zaki-alawi/" class="flex items-center justify-center w-10 h-10 text-xl transition-all duration-500 bg-transparent border border-gray-300 rounded-md hover:border-primary hover:bg-primary hover:text-light" target="_blank"><i
                                    class="ri-linkedin-box-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/zakialawi_/" class="flex items-center justify-center w-10 h-10 text-xl transition-all duration-500 bg-transparent border border-gray-300 rounded-md hover:border-primary hover:bg-primary hover:text-light" target="_blank"><i
                                    class="ri-instagram-fill"></i>
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5">
                        <h5 class="text-2xl font-bold ">About</h5>
                        <div class="space-y-1 text-dark">
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">About</a>
                            </div>
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">Career</a>
                            </div>
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">History</a>
                            </div>
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">Team</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5">
                        <h5 class="text-2xl font-bold ">Blog</h5>
                        <div class="space-y-1 text-dark">
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">Menu 1</a>
                            </div>
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">Menu 2</a>
                            </div>
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">Menu 3</a>
                            </div>
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">Menu 4</a>
                            </div>
                            <div>
                                <a href="#" class="text-lg transition-all duration-300 hover:text-primary">Menu 5</a>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <div class="flex flex-col">
                            <h5 class="mb-6 text-2xl font-bold">Contact Us</h5>
                            {{-- <p class="text-lg font-semibold text-muted ">+346 932 857</p> --}}
                            <p class="text-base font-medium text-muted mt-2s">hallo@zakialawi.my.id</p>
                            <form class="w-full max-w-lg mt-6 ms-auto">
                                <div class="relative flex items-center px-1 overflow-hidden bg-white rounded-md shadow">
                                    <input type="email" placeholder="Your Email Address" class="px-3 py-3.5 text-black w-full text-base border-0 ring-0 bg-white outline-none focus:ring-0" name="email">
                                    <button type="button" id="send-email-button" class="px-3 py-1 font-semibold text-white transition-all duration-500 rounded bg-secondary hover:bg-primary"><i class="ri-send-plane-2-line"></i></button>
                                </div>
                            </form>
                            <div id="message-newsletter"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 border-t border-gray-300">
            <div class="container">
                <div class="flex flex-wrap items-center justify-center gap-6 sm:justify-between">
                    <p class="text-base font-semibold text-muted">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>. All rights reserved.
                    </p>

                    <div>
                        <a href="{{ route("termsAndConditions") }}" class="text-base font-semibold hover:text-primary text-muted">Terms Conditions</a>
                        <span class="text-base font-semibold text-muted"> &amp;</span>
                        <a href="{{ route("privacyPolicy") }}" class="text-base font-semibold text-muted hover:text-primary">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push("javascript")
    <script>
        $(document).ready(function() {
            $("#send-email-button").click(function(e) {
                $.ajax({
                    type: "post",
                    url: "{{ route("newsletter.store") }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "email": $("input[name=email]").val(),
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $("#message-newsletter").html(`<div class="text-info" role="alert">Sending...</div>`);
                    },
                    success: function(response) {
                        const html = `<div class="text-success" role="alert">${response.message}</div>`;
                        $("#message-newsletter").html(html);
                        if (response.message.success == true) {
                            $("input[name=email]").val("");
                        }
                    },
                    error: function(error) {
                        const html = `<div class="text-error" role="alert">${error.responseJSON.message}</div>`;
                        $("#message-newsletter").html(html);
                    },
                });
            });
        });
    </script>
@endpush
