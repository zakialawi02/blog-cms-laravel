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

        <!-- HERO BLOG -->
        <section class="w-full p-3 bg-gradient-to-tr from-primary to-secondary min-h-[40vh]">
            <div class="container py-8 mx-auto text-center uppercase pt-18 text-light">
                <h1 class="px-3 mb-3 text-3xl font-bold">Blog</h1>
                <p class="capitalize w-[80%] md:w-[50%] px-3 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam cum magni, ipsum facilis fugiat voluptatibus.</p>
            </div>
            <div class="w-full max-w-lg m-3 mx-auto">
                <form id="search-blog" method="get" class="" x-data="{ search: '' }">
                    <div class="flex items-center px-1 overflow-hidden bg-white rounded-md shadow ">
                        <input type="search" placeholder="Search" class="px-3 py-3.5 text-dark w-full text-base border-0 ring-0 bg-light outline-none focus:ring-0" x-model="search">
                        <button type="submit" class="px-3 py-2 font-semibold transition-all duration-500 rounded text-light " :class="(search) ? 'bg-secondary hover:bg-primary' : 'bg-muted cursor-not-allowed'" :disabled="!search"><i class="ri-search-line"></i></button>
                    </div>
                </form>
                <p class="my-2 text-light">You Serch: keyword</p>
            </div>
        </section>

        <main class="w-full">
            <!-- Sticky/Popular Blog Post -->
            <section class="container px-6 py-10 mx-auto">
                <div class="lg:flex lg:-mx-6">
                    <div class="lg:w-3/4 lg:px-6">
                        <img class="object-cover object-center w-full h-60 xl:h-[20rem] rounded-xl" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                        <div>
                            <p class="mt-6 text-sm uppercase text-primary">Want to know</p>

                            <h1 class="max-w-lg mt-4 text-2xl font-semibold leading-tight hover:underline hover:text-muted text-dark">
                                <a href="#" class="">
                                    What do you want to know about UI
                                </a>
                            </h1>

                            <div class="flex items-center mt-6">
                                <img class="object-cover object-center w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="">

                                <div class="mx-4">
                                    <h1 class="text-sm text-muted">Amelia. Anderson</h1>
                                    <p class="text-sm text-muted">Lead Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 lg:w-1/4 lg:mt-0 lg:px-6 ">
                        <div>
                            <h3 class="capitalize text-primary">Design instument</h3>

                            <a href="#" class="block mt-2 font-medium text-dark hover:underline hover:text-muted ">
                                How to raise $100k+ by using blox ui kit on your design
                            </a>
                        </div>

                        <hr class="my-4 border-muted">

                        <div>
                            <h3 class="capitalize text-primary">UI Resource</h3>

                            <a href="#" class="block mt-2 font-medium text-dark hover:underline hover:text-muted">
                                Should you creat UI Product by using Blox?
                            </a>
                        </div>

                        <hr class="my-4 border-muted">

                        <div>
                            <h3 class="capitalize text-primary">Premium Collection</h3>

                            <a href="#" class="block mt-2 font-medium text-dark hover:underline hover:text-muted ">
                                Top 10 Blocks you can get on Blox's collection.
                            </a>
                        </div>

                        <hr class="my-4 border-muted">

                        <div>
                            <h3 class="capitalize text-primary">Premium kits</h3>

                            <a href="#" class="block mt-2 font-medium text-dark hover:underline hover:text-muted ">
                                Top 10 Ui kit you can get on Blox's collection.
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Recent Blog Post -->
            <section class="container px-6 py-10 mx-auto md:px-4">
                <div class="mb-6 text-3xl font-semibold">
                    <h2>Recent Post</h2>
                    <div class="w-[50%] md:w-[84%] -translate-y-4 float-end h-[4px] bg-gradient-to-r from-transparent to-secondary -z-1"></div>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <article>
                            <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                            <div class="mt-4">
                                <span class="uppercase text-primary">category</span>

                                <h1 class="mt-4 text-xl font-semibold text-dark hover:underline hover:text-muted">
                                    <a href="#">
                                        What do you want to know about UI
                                    </a>
                                </h1>

                                <p class="mt-2 text-muted line-clamp-3">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam est asperiores vel, ab animi
                                    recusandae nulla veritatis id tempore sapiente
                                </p>

                                <div class="flex items-center justify-between mt-4">
                                    <div>
                                        <a href="#" class="text-lg font-medium text-accent hover:text-info">
                                            John snow
                                        </a>

                                        <p class="text-sm text-muted">February 1, 2022</p>
                                    </div>

                                    <a href="#" class="inline-block underline text-primary hover:text-accent">Read more</a>
                                </div>

                            </div>
                        </article>
                    @endfor
                </div>
                </div>
            </section>



        </main>


        <!-- Footer -->
        @include("components.front.footer")

    </body>

</html>
