<template>
<div>{{ places }} </div>
    
</template>
<script>
export default {
    props: [ 'results' ],
    data() {
        return {
            name : "HELLO WORLD",
            places : [],
        }
    },
    mounted() {
        if(this.results)
        {
            this.places = this.results
        }
    },
    created() {
        this.places = this.$route.query.results

        // this.axios
        //     .get('http://127.0.0.1:8000/api/categories/13020/places/')
        //     .then(response => {
        //         this.results = response.data;
        //     });

        // this.$watch(
        //     () => this.$route.params,
        //     () => {
        //         this.fetchData()
        //     },
        //     // fetch the data when the view is created and the data is
        //     // already being observed
        //     { immediate: true }
        // )
    },
    methods: {
        // fetchData() {
        //     this.error = this.post = null
        //     this.loading = true
        //     // replace `getPost` with your data fetching util / API wrapper
        //     getPost(this.$route.params.id, (err, post) => {
        //         this.loading = false
        //         if (err) {
        //         this.error = err.toString()
        //         } else {
        //         this.post = post
        //         }
        //     })
        // },
    }

    // beforeRouteEnter(to, from, next) {
    //     getPost(to.params.id, (err, post) => {
    //     next(vm => vm.setData(err, post))
    //     })
    // },
    // when route changes and this component is already rendered,
    // the logic will be slightly different.
    // async beforeRouteUpdate(to, from) {
    //     this.results = null
    //     try {
    //     this.results = await getPost(to.params.id)
    //     } catch (error) {
    //     this.error = error.toString()
    //     }
    // },
}
</script>