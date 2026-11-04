import { Link, Outlet, useNavigate } from '@tanstack/react-router'
import { useQueryClient } from '@tanstack/react-query'
import { useTranslation } from 'react-i18next'
import { logout } from '@/api/auth'
import { LanguageSwitcher } from '@/components/LanguageSwitcher'
import { Button } from '@/components/ui/button'
import { useAuthStore } from '@/stores/auth'

export function AppLayout() {
    const { t } = useTranslation()
    const navigate = useNavigate()
    const queryClient = useQueryClient()
    const clear = useAuthStore((s) => s.clear)

    const onLogout = async () => {
        try {
            await logout()
        } catch {
            /* le jeton local est effacé quoi qu'il arrive */
        } finally {
            clear()
            queryClient.clear()
            await navigate({ to: '/login' })
        }
    }

    return (
        <div className="min-h-screen flex flex-col">
            <header className="flex items-center justify-between gap-4 border-b border-border px-4 py-3">
                <Link to="/" className="text-lg font-semibold text-primary">
                    {t('app.name')}
                </Link>
                <div className="flex items-center gap-3">
                    <LanguageSwitcher />
                    <Button variant="outline" size="sm" onClick={() => void onLogout()}>
                        {t('nav.logout')}
                    </Button>
                </div>
            </header>
            <main className="flex-1 p-4">
                <Outlet />
            </main>
        </div>
    )
}
