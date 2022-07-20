import TransactsComponent from './components/TransactsComponent.vue';
import AtmComponent from './components/AtmComponent.vue';
import TransferComponent from './components/TransferComponent.vue';
 
export const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: TransactsComponent
    },
    {
        name: 'atm',
        path: '/atm',
        component: AtmComponent
    },
    {
        name: 'transfer',
        path: '/transfer',
        // path: '/edit/:id',
        component: TransferComponent
    }
];