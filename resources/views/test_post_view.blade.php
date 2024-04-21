<!doctype html>
<html lang="en">

    <head>
        <title>Test</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link rel="shortcut icon" href="{{ asset("assets/img/favicon.ico") }}" type="image/x-icon">

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="robots" content="index,follow" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
        @vite(["resources/css/app-tailwind.css"])

    </head>

    <body>
        <!-- NAVBAR -->
        @include("components.front.navbar")

        <main class="container w-full p-4 mx-auto mb-10">

            <div class="mt-16">

                <div id="breadcrumb" class="">
                    <nav aria-label="breadcrumb">
                        <ol class="flex items-center">
                            <li class="">
                                <a class="text-dark hover:text-secondary" href="#">Home</a>
                                <span> <i class="ri-arrow-right-s-line"></i> </span>
                            </li>
                            <li class="">
                                <a class="text-dark hover:text-secondary" href="#">Categories</a>
                                <span> <i class="ri-arrow-right-s-line"></i> </span>
                            </li>
                            <li class="">
                                <a class="text-dark hover:text-secondary" aria-current="page" href="#">Title of Post</a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div id="main" class="flex flex-col flex-wrap flex-auto flex-grow gap-4 md:flex-row">
                    <div id="post" class="w-full md:w-[60%] md:flex-grow">
                        <div id="main-content" class="">
                            <div id="post-header" class="py-1 my-2 mb-3">
                                <h1 class="mb-2 text-2xl font-bold">Title Post Here Broo!! Title Post Here Broo!!</h1>
                                <div class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center after:content-['.'] after:mx-2 after:top-[-3px] after:relative after:px-1 after:font-black after:text-secondary text-dark hover:text-secondary gap-1" target="_blank">
                                        <img class="w-6" src="{{ asset("assets/img/profile/admin.png") }}" alt="author">Author
                                    </a>
                                    <a href="#" class="text-dark hover:text-secondary" target="_blank">29 April 2022</a>
                                </div>
                            </div>
                        </div>
                        <div id="feature-image" class="mb-3">
                            <img class="max-h-[26rem] w-full rounded-lg object-cover object-center" src="https://source.unsplash.com/random" alt="feature image">
                        </div>
                        <div id="post-content" class="">
                            <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same <a href="#">vocabulary</a>. The languages only differ in their grammar, their pronunciation and their most common
                                words.</p>
                            <p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it <mark>would be</mark> necessary to have uniform grammar, pronunciation and more common words.</p>
                            <p>One could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>

                        </div>

                        <div class="py-1 my-2 border-b-2 border-dark border-opacity-40"></div>

                        <div class="post-bottom">
                            <div class="flex items-center justify-between text-secondary">
                                <div class="">
                                    <!-- tags -->
                                    <a href="#" class="px-1 py-[0.1rem] mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Trending</a>
                                    <a href="#" class="px-1 py-[0.1rem] mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Video</a>
                                    <a href="#" class="px-1 py-[0.1rem] mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Featured</a>
                                </div>
                                <div class="text-2xl">
                                    <!-- social icons -->
                                    <ul class="flex flex-row items-center gap-2">
                                        <p class="text-sm">Share:</p>
                                        <li class="hover:text-primary hover:scale-125"><a href="#"><i class="ri-facebook-fill"></i></a></li>
                                        <li class="hover:text-primary hover:scale-125"><a href="#"><i class="ri-instagram-fill"></i></a></li>
                                        <li class="hover:text-primary hover:scale-125"><a href="#"><i class="ri-linkedin-box-fill"></i></a></li>
                                        <li class="hover:text-primary hover:scale-125"><a href="#"><i class="ri-telegram-fill"></i></a></li>
                                        <li class="hover:text-primary hover:scale-125"><a href="#"><i class="ri-mail-line"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="author">

                        </div>

                    </div>

                    <div id="sidebar" class="w-full md:w-[30%] mt-10 md:mt-0">
                        <div id="popular-posts" class="p-2 mb-3 border-2 rounded-lg border-neutral">
                            <div class="text-xl font-bold text-center">
                                <h3>Popular Posts</h3>
                            </div>
                            <div class="p-2 mx-auto">

                                <article>
                                    <div class="flex items-center gap-2 p-2">
                                        <a href="#" class="block mr-2 shrink-0">
                                            <img alt="post image" src="https://source.unsplash.com/random" class="object-cover rounded-3xl size-14" />
                                        </a>

                                        <div>
                                            <h3 class="font-medium sm:text-lg line-clamp-2">
                                                <a href="#" class="block hover:text-secondary">Lorem ipsum dolor sit amet consectetur.</a>
                                            </h3>

                                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                                <p class="hidden sm:block sm:text-xs sm:text-gray-500">Posted by <a href="#" class="font-medium underline hover:text-gray-700">Alex</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="flex items-center gap-2 p-2">
                                        <a href="#" class="block mr-2 shrink-0">
                                            <img alt="post image" src="https://source.unsplash.com/random" class="object-cover rounded-3xl size-14" />
                                        </a>

                                        <div>
                                            <h3 class="font-medium sm:text-lg line-clamp-2">
                                                <a href="#" class="block hover:text-secondary">Lorem ipsum dolor sit amet consectetur.</a>
                                            </h3>

                                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                                <p class="hidden sm:block sm:text-xs sm:text-gray-500">Posted by <a href="#" class="font-medium underline hover:text-gray-700">Alex</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="flex items-center gap-2 p-2">
                                        <a href="#" class="block mr-2 shrink-0">
                                            <img alt="post image" src="https://source.unsplash.com/random" class="object-cover rounded-3xl size-14" />
                                        </a>

                                        <div>
                                            <h3 class="font-medium sm:text-lg line-clamp-2">
                                                <a href="#" class="block hover:text-secondary">Lorem ipsum dolor sit amet consectetur.</a>
                                            </h3>

                                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                                <p class="hidden sm:block sm:text-xs sm:text-gray-500">Posted by <a href="#" class="font-medium underline hover:text-gray-700">Alex</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                            </div>
                        </div>
                        <div id="categories" class="p-2 mb-3 border-2 rounded-lg border-neutral">
                            <div class="text-xl font-bold text-center">
                                <h3>Categories</h3>
                            </div>
                            <div class="p-2 mx-auto">
                                <ul class="flex flex-col gap-4 p-2 font-semibold">
                                    <li><a href="#" class="hover:text-secondary"><i class="mr-2 text-xl ri-skip-right-line text-secondary"></i>Category 1</a></li>
                                    <li><a href="#" class="hover:text-secondary"><i class="mr-2 text-xl ri-skip-right-line text-secondary"></i>Category 2</a></li>
                                    <li><a href="#" class="hover:text-secondary"><i class="mr-2 text-xl ri-skip-right-line text-secondary"></i>Category 3</a></li>
                                    <li><a href="#" class="hover:text-secondary"><i class="mr-2 text-xl ri-skip-right-line text-secondary"></i>Category 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </main>

        <footer id="footer" class="">
            <div class="relative max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8 lg:pt-24">
                <div class="lg:flex lg:items-end lg:justify-between">
                    <div>
                        <div class="flex justify-center text-teal-600 lg:justify-start">
                            <div class="">LOGO</div>
                        </div>

                        <p class="max-w-md mx-auto mt-6 leading-relaxed text-center text-gray-500 lg:text-left"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt consequuntur amet culpa cum itaque neque.
                        </p>
                    </div>

                    <ul class="flex flex-wrap justify-center gap-6 mt-12 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
                        <li>
                            <a class="transition text-dark hover:text-secondary" href="#"> About </a>
                        </li>

                        <li>
                            <a class="transition text-dark hover:text-secondary" href="#"> Services </a>
                        </li>

                        <li>
                            <a class="transition text-dark hover:text-secondary" href="#"> Projects </a>
                        </li>

                        <li>
                            <a class="transition text-dark hover:text-secondary" href="#"> Blog </a>
                        </li>
                    </ul>
                </div>

                <p class="mt-12 text-sm text-center text-gray-500 lg:text-right">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>. All rights reserved.
                </p>
            </div>
        </footer>

    </body>

</html>
