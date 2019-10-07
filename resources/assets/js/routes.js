import Home from './components/Home.vue';
import Login from './components/auth/Login.vue';
import CemeteriesMain from './components/cemeteries/Main.vue';
import CemeteriesList from './components/cemeteries/List.vue';
import NewCemetery from './components/cemeteries/New.vue';
import Cemetery from './components/cemeteries/View.vue';
import UpdateCemetery from './components/cemeteries/Update.vue';

export const routes = [
    {
        path: '/',
        component: Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/cemeteries',
        component: CemeteriesMain,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: '/',
                component: CemeteriesList
            },
            {
                path: 'new',
                component: NewCemetery
            },
            {
                path: ':id',
                component: Cemetery
            },
            {
                path:'update/:id',
                component:UpdateCemetery
            },
            {
                path:'delete/:id',
            }

        ]
    }
];
