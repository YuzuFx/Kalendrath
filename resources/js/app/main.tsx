import { QueryClientProvider } from '@tanstack/react-query'
import { RouterProvider } from '@tanstack/react-router'
import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import '../../css/app/app.css'
import './i18n'
import { queryClient, router } from './router'
import { useAuthStore } from './stores/auth'

// Sur 401, le store efface le jeton : on renvoie vers la connexion.
useAuthStore.subscribe((state, prev) => {
    if (prev.token && !state.token) void router.navigate({ to: '/login' })
})

const container = document.getElementById('root')
if (!container) throw new Error('Missing #root')

createRoot(container).render(
    <StrictMode>
        <QueryClientProvider client={queryClient}>
            <RouterProvider router={router} />
        </QueryClientProvider>
    </StrictMode>,
)
