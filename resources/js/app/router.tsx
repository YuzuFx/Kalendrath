import { QueryClient } from '@tanstack/react-query'
import { createRootRoute, createRoute, createRouter, redirect, Outlet } from '@tanstack/react-router'
import { AppLayout } from '@/layouts/AppLayout'
import { HomePage } from '@/routes/HomePage'
import { LoginPage } from '@/routes/LoginPage'
import { useAuthStore } from '@/stores/auth'

export const queryClient = new QueryClient({
    defaultOptions: { queries: { staleTime: 30_000, retry: false } },
})

const rootRoute = createRootRoute({ component: Outlet })

const loginRoute = createRoute({
    getParentRoute: () => rootRoute,
    path: '/login',
    component: LoginPage,
    beforeLoad: () => {
        if (useAuthStore.getState().token) throw redirect({ to: '/' })
    },
})

/** Route de layout protégée : tout écran de jeu s'y accrochera. */
const authedRoute = createRoute({
    getParentRoute: () => rootRoute,
    id: 'authed',
    component: AppLayout,
    beforeLoad: () => {
        if (!useAuthStore.getState().token) throw redirect({ to: '/login' })
    },
})

const homeRoute = createRoute({ getParentRoute: () => authedRoute, path: '/', component: HomePage })

const routeTree = rootRoute.addChildren([loginRoute, authedRoute.addChildren([homeRoute])])

export const router = createRouter({ routeTree, basepath: '/app' })

declare module '@tanstack/react-router' {
    interface Register {
        router: typeof router
    }
}
