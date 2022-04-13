<template>
    <div>
        <!-- <table class="table table-bordered">
            <thead>
            <tr>
                <th>Team Code</th>
                <th>Number</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="places in place" :key="place.id">
                <td>{{ place.team_code }}</td>
                <td>{{ place.number }}</td>
            </tr>
            </tbody>
        </table> -->
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
            .get('http://localhost:8000/api/places')
            .then(response => {
                this.places = response.data;
            });
    },
    methods: {
        // methods
    },
    components: {
        // MDBCarousel,
    },
}
</script>