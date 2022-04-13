<template>
    <div>
        <navigation-component></navigation-component>
        <router-view></router-view>
    </div>
</template>
<script>
import NavigationComponent from './components/NavigationComponent.vue'

export default {
    components: {
        NavigationComponent
    }
}
</script>