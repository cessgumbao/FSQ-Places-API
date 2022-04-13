import LandingComponent from './components/LandingComponent.vue';
import PlacesByCategoryComponent from './components/PlacesByCategoryComponent.vue';
import CategoryComponent from './components/CategoryComponent.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: LandingComponent
    },
    {
        name: 'categories.place',
        path: '/api/categories/:category_id/places/:city_id',
        component: PlacesByCategoryComponent,
        props: true
    },
];