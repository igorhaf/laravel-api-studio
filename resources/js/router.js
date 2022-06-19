import { createWebHistory, createRouter } from "vue-router";
import Code from './pages/Code'
import Restful from './pages/Restful'
import Database from './pages/Database'
import Env from './pages/Env'

const routes = [
    {
        path: "/",
        name: "Code",
        component: Code,
    },
    {
        path: "/restful",
        name: "Restful",
        component: Restful,
    },
    {
        path: "/database",
        name: "Database",
        component: Database,
    },
    {
        path: "/env",
        name: "Env",
        component: Env,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
