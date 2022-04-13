<template>
    <nav class="flex items-center text-white py-3 flex-wrap fixed w-full z-10 top-0" style="background: rgb(0 0 0 / 76%);">
        <button
            class="text-white inline-flex p-3 hover:bg-red-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler"
            data-target="#navigation"
        >
            <i class="material-icons">menu</i>
        </button>
        <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation" >
            <div class="lg:inline-flex lg:flex-row m-auto lg:w-auto w-full lg:items-center items-start  flex flex-col lg:h-auto" >
                <router-link :to="{name: 'home'}" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded  items-center justify-center hover:text-red-300">
                    <span>Home</span>
                </router-link>
                <a href="#categories" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded  items-center justify-center hover:text-red-300" >
                    <span>Categories</span>
                </a>
                <a href="#nearby_places" class="lg:inline-flex lg:w-auto w-full px-4 py-2 rounded  items-center justify-center hover:text-red-300" >
                    <span>Nearby Places</span>
                </a>
            </div>
        </div>
    </nav>
</template>