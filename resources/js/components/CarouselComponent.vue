<template>
    <div id="carouselDefault" class="carousel slide relative" data-bs-ride="carousel">
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
            <button v-for="place in places" :key="place.details.fsq_id" 
            type="button"
            data-bs-target="#carouselDefault"
            :data-bs-slide-to="place.key"
            :class="{ active: place.active }"
            :aria-current="place.active">
            </button>
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
            <div v-for="place in places" :key="place.details.fsq_id" class="carousel-item relative float-left w-full" :class="{ active : place.active }">
                <img
                    :src="place.details.sample_photo.prefix + place.details.sample_photo.width + 'x' + place.details.sample_photo.height + place.details.sample_photo.suffix"
                    class="block object-cover h-screen w-full"
                    alt=""
                />
                <div class="carousel-caption hidden md:block absolute text-center">
                    <h5 class="text-xl">{{ place.city }}</h5>
                    <p>{{ place.details.name }}</p>
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
</template>

<script>
export default {
    data() {
        return {
            places: []
        }
    },
    created() {
        this.axios
            .get('http://127.0.0.1:8000/api/places/cities')
            .then(response => {
                this.places = response.data;
            });
    },
}
</script>
