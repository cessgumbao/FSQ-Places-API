<template>
    <div id="categories" class="">
        <div class="justify-center pb-12 p-4">
            <div class="flex lg:px-5 lg:py-5 sm:px-3 py-5 items-end h-25 w-full justify-center">
                <p class="text-3xl font-semibold">Discover places to go</p>
            </div>
            <div class="flex md:px-5 md:py-5 sm:px-3 py-3 pb-5 justify-center">
                <div class="grid lg:grid-cols-3 md:grid-cols-3 xs:grid-cols-3 lg:gap-7 md:gap-7 xs:gap-5 text-center">
                    <router-link :to="{name: 'categories.place', params: { category_id : category.id, city_id : city }}" v-for="category in categories" :key="category.id" class="rounded-xl md:h-64">
                        <div class="rounded-full transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-50 duration-200 lg:w-32 m-auto" style="background: rgb(192 0 0)">
                            <img :src="category.icon.prefix + '120' + category.icon.suffix" class="rounded-t-xl lg:p-5 w-full" />
                        </div>
                        <p class="text-xl md:text-xl text-gray-900 pt-2"> {{ category.name }} </p>
                    </router-link>
                </div> 
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'categories',
        'city',
    ],
    // data() {
    //     return {
    //         results : []
    //     }
    // }
}
</script>