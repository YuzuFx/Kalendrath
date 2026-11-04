import { useMutation } from '@tanstack/react-query'
import { useNavigate } from '@tanstack/react-router'
import { useState, type FormEvent } from 'react'
import { useTranslation } from 'react-i18next'
import { ApiError } from '@/api/client'
import { login } from '@/api/auth'
import { LanguageSwitcher } from '@/components/LanguageSwitcher'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { useAuthStore } from '@/stores/auth'

export function LoginPage() {
    const { t } = useTranslation()
    const navigate = useNavigate()
    const setSession = useAuthStore((s) => s.setSession)
    const expired = useAuthStore((s) => s.expired)
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')

    const mutation = useMutation({
        mutationFn: () => login(email, password),
        onSuccess: async (data) => {
            setSession(data.token, data.user)
            await navigate({ to: '/' })
        },
    })

    const onSubmit = (e: FormEvent) => {
        e.preventDefault()
        mutation.mutate()
    }

    const invalid =
        mutation.error instanceof ApiError && (mutation.error.status === 401 || mutation.error.status === 422)

    return (
        <div className="min-h-screen flex flex-col items-center justify-center gap-4 p-4">
            <LanguageSwitcher />
            <Card className="w-full max-w-sm">
                <CardHeader>
                    <CardTitle>{t('auth.title')}</CardTitle>
                </CardHeader>
                <CardContent>
                    <form onSubmit={onSubmit} className="flex flex-col gap-4">
                        {expired && (
                            <p role="status" className="text-sm text-muted-foreground">
                                {t('auth.sessionExpired')}
                            </p>
                        )}
                        <div className="flex flex-col gap-2">
                            <Label htmlFor="email">{t('auth.email')}</Label>
                            <Input id="email" type="email" autoComplete="username" required value={email} onChange={(e) => setEmail(e.target.value)} />
                        </div>
                        <div className="flex flex-col gap-2">
                            <Label htmlFor="password">{t('auth.password')}</Label>
                            <Input id="password" type="password" autoComplete="current-password" required value={password} onChange={(e) => setPassword(e.target.value)} />
                        </div>
                        {mutation.isError && (
                            <p role="alert" className="text-sm text-destructive">
                                {invalid ? t('auth.invalid') : t('auth.error')}
                            </p>
                        )}
                        <Button type="submit" disabled={mutation.isPending}>
                            {t('auth.submit')}
                        </Button>
                    </form>
                </CardContent>
            </Card>
        </div>
    )
}
