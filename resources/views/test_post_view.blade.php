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

        <main class="container w-full p-4 mx-auto ">

            <div class="mt-16">

                <div id="breadcrumb" class="">
                    <nav aria-label="breadcrumb">
                        <ol class="flex items-center">
                            <li class="">
                                <a class="text-dark hover:text-accent breadcrumb-next" href="#">Home</a>
                            </li>
                            <li class="">
                                <a class="text-dark hover:text-accent breadcrumb-next" href="#">Blog</a>
                            </li>
                            <li class="">
                                <a class="text-dark hover:text-accent breadcrumb-next" href="#">Categories</a>
                            </li>
                            <li class="">
                                <a class="text-dark hover:text-accent" aria-current="page" href="#">Title of Post</a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div id="main" class="flex flex-col flex-wrap flex-auto flex-grow gap-4 md:flex-row text-dark">
                    <div id="post" class="w-full md:w-[60%] md:flex-grow">
                        <div id="main-content" class="">
                            <div id="post-header" class="py-1 my-2 mb-3">
                                <h1 class="mb-2 text-3xl font-bold">Title Post Here Broo!! Title Post Here Broo!!</h1>
                                <div class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center after:content-['.'] after:mx-2 after:top-[-3px] after:relative after:px-1 after:font-black after:text-secondary  hover:text-primary gap-1" target="_blank">
                                        <img class="w-6" src="{{ asset("assets/img/profile/admin.png") }}" alt="author">Author
                                    </a>
                                    <a href="#" class="hover:text-primary" target="_blank">29 April 2022</a>
                                </div>
                            </div>
                        </div>
                        <div id="feature-image" class="mb-3">
                            <img class="max-h-[26rem] w-full rounded-lg object-cover object-center" src="https://source.unsplash.com/random" alt="feature image">
                        </div>
                        <div id="post-content" class="text-lg">
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
                                    <a href="#" class="px-1 py-[0.1rem] transition-all duration-300 mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Trending</a>
                                    <a href="#" class="px-1 py-[0.1rem] transition-all duration-300 mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Video</a>
                                    <a href="#" class="px-1 py-[0.1rem] transition-all duration-300 mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#Featured</a>
                                </div>
                                <div class="text-2xl">
                                    <!-- social icons -->
                                    <ul class="flex flex-row items-center gap-2">
                                        <p class="text-sm">Share:</p>
                                        <li class="transition-all duration-300 hover:text-primary hover:scale-125"><a href="#"><i class="ri-facebook-fill"></i></a></li>
                                        <li class="transition-all duration-300 hover:text-primary hover:scale-125"><a href="#"><i class="ri-instagram-fill"></i></a></li>
                                        <li class="transition-all duration-300 hover:text-primary hover:scale-125"><a href="#"><i class="ri-linkedin-box-fill"></i></a></li>
                                        <li class="transition-all duration-300 hover:text-primary hover:scale-125"><a href="#"><i class="ri-telegram-fill"></i></a></li>
                                        <li class="transition-all duration-300 hover:text-primary hover:scale-125"><a href="#"><i class="ri-mail-line"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="author">

                        </div>

                        <div class="py-1 my-2 border-b-2 border-dark border-opacity-40"></div>

                        <div id="comment-section">
                            <div id="" class="mt-4">
                                <div class="mb-3">
                                    <h2 class="text-3xl font-bold">Comments</h2>
                                </div>

                                <div class="flex justify-start mt-4">
                                    <button type="button" id="show-comments-section" class="px-4 py-2 font-bold text-white transition-all duration-300 rounded-lg bg-primary hover:bg-secondary focus:outline-none">Show Comments Section</button>
                                </div>

                                <form action="" method="post" class="space-y-4">
                                    <div class="flex items-center gap-4 mb-3">
                                        <img class="w-8 h-8 rounded-full" src="{{ asset("assets/img/profile/user.png") }}" alt="Ahmad Zaki Alawi">
                                        <span class="text-sm text-gray-700">comment as <b>[Ahmad Zaki Alawi]</b></span>
                                    </div>

                                    <div class="space-y-2">
                                        <textarea name="comment" id="comment" cols="10" rows="5" class="w-full p-2 border-2 rounded-lg border-neutral" placeholder="Write your comment..." required></textarea>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="px-4 py-2 font-semibold text-white rounded-lg bg-primary hover:bg-secondary">Post Comment</button>
                                    </div>
                                </form>

                            </div>
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
                                                <a href="#" class="block hover:text-primary">Lorem ipsum dolor sit amet consectetur.</a>
                                            </h3>

                                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                                <p class="hidden sm:block sm:text-xs">Posted by <a href="#" class="font-medium hover:text-primary">Alex</a>
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
                                                <a href="#" class="block hover:text-primary">Lorem ipsum dolor sit amet consectetur.</a>
                                            </h3>

                                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                                <p class="hidden sm:block sm:text-xs">Posted by <a href="#" class="font-medium hover:text-primary">Alex</a>
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
                                                <a href="#" class="block hover:text-primary">Lorem ipsum dolor sit amet consectetur.</a>
                                            </h3>

                                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                                <p class="hidden sm:block sm:text-xs">Posted by <a href="#" class="font-medium hover:text-primary">Alex</a>
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
                                    <li><a href="#" class="hover:text-primary"><i class="mr-2 text-xl ri-skip-right-line text-info"></i>Category 1</a></li>
                                    <li><a href="#" class="hover:text-primary"><i class="mr-2 text-xl ri-skip-right-line text-info"></i>Category 2</a></li>
                                    <li><a href="#" class="hover:text-primary"><i class="mr-2 text-xl ri-skip-right-line text-info"></i>Category 3</a></li>
                                    <li><a href="#" class="hover:text-primary"><i class="mr-2 text-xl ri-skip-right-line text-info"></i>Category 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </main>

        <!-- Footer -->
        @include("components.front.footer")



    </body>

</html>
