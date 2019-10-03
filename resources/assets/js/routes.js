import Home from './pages/dashboard/Home.vue';
import Login from './components/auth/Login.vue';
import CemeteriesMain from './pages/cemeteries/Main.vue';
import CemeteriesList from './pages/cemeteries/List.vue';
import NewCemetery from './pages/cemeteries/New.vue';
import CemeteryPlanning from './pages/cemeteries/CemeteryPlanning.vue';

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
                path: 'cemetery_planning/:id',
                component: CemeteryPlanning
            }
        ]
    }
];
