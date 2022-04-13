<template>
    <div>
        <div class="bg-main md:bg-center xs:bg-center relative" id="home">
            <div class="bg-header flex md:flex-row xs:flex-col items-center lg:h-screen pb-12 bg-gradient-to-r from-red-700 md:pt-32 pt-20">
                <div class="text-white mx-4 p-4 text-left md:p-8 mix-blend-normal">
                    <h1 class="text-8xl uppercase">Japan</h1>
                    <p class="text-xl">Endless Discovery</p>
                </div>
                <div class="grow lg:pt-20 p-4">
                    <div class="flex lg:px-5 lg:py-5 sm:px-3 py-3 xs:px-3 xs-3 items-end h-25 w-full justify-center">
                        <p class="text-white text-center text-3xl font-semibold">Find your next destination</p>
                    </div>
                    <div class="flex justify-center">
                        <div class="xl:w-96 flex">
                            <img class="object-contain h-10 w-10" src="/images/location-pin.png" alt="Location logo">
                            <select class="form-select form-select-lg appearance-none block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border  border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" aria-label=".form-select-lg example" @change="getCity()" v-model="selected">
                                <option value="">Select your next destination</option>
                                <option value="0">Tokyo</option>
                                <option value="1">Yokohama</option>
                                <option value="2">Kyoto</option>
                                <option value="3">Osaka</option>
                                <option value="4">Sapporo</option>
                                <option value="5">Nagoya</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div id="carouselDefault" class="carousel slide carousel-fade relative lg:w-8/12 my-6" data-bs-ride="carousel">
                            <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
                                <button v-for="(place, index) in places" :key="index" 
                                type="button"
                                data-bs-target="#carouselDefault"
                                :data-bs-slide-to="index"
                                :class="{ active : place.active }"
                                :aria-current="place.active">
                                </button>
                            </div>
                            <div class="carousel-inner relative w-full overflow-hidden">
                                <div v-for="(place, index) in places" :key="index" class="carousel-item relative float-left w-full" :class="{ active : place.active }">
                                    <img
                                        :src="place.random_photo.prefix + place.random_photo.width + 'x' + place.random_photo.height + place.random_photo.suffix"
                                        class="block object-cover h-96 w-full"
                                        alt=""
                                    />
                                    <div class="carousel-caption hidden md:block absolute text-center">
                                        <h5 class="text-2xl">{{ place.location.locality + ', ' + place.location.region}}</h5>
                                        <p class="text-xl">{{ place.name }}</p>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                                type="button"
                                data-bs-target="#carouselDefault"
                                data-bs-slide="prev"
                            >
                                <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button
                                class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                                type="button"
                                data-bs-target="#carouselDefault"
                                data-bs-slide="next"
                            >
                                <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex space-x-2 justify-center py-4">
                        <button
                            type="button"
                            data-mdb-ripple="true"
                            data-mdb-ripple-color="light"
                            class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                        >Explore {{ city }}</button>
                    </div>
                </div>
            </div>
        </div>
        <category-component :categories="categories" :city="selected"></category-component>
    </div>
    
</template>
<script>
import CategoryComponent from './CategoryComponent.vue';

export default {
    data() {
        return {
            places: [],
            categories : [],
            selected : '0',
            city : '',
        }
    },
    created() {
        this.getCity()
    },
    methods : {
        getCity() {
            this.axios
                .get('http://127.0.0.1:8000/api/places/cities/' + this.selected)
                .then(response => {
                    this.categories = response.data.categories;
                    this.places = response.data.details;
                    this.city = response.data.city;
            });
        }
    },
    components : {
        CategoryComponent,
    }
}
</script>
<style scoped>
    #carouselDefault {
            box-shadow: #000 1px 13px 20px 0px;
    }
</style> >