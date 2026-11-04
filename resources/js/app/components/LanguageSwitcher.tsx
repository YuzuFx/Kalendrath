import { useTranslation } from 'react-i18next'
import { SUPPORTED_LANGUAGES } from '@/i18n'
import { Button } from '@/components/ui/button'

export function LanguageSwitcher() {
    const { i18n, t } = useTranslation()
    const current = i18n.resolvedLanguage
    return (
        <div role="group" aria-label={t('nav.language')} className="flex gap-1">
            {SUPPORTED_LANGUAGES.map((lng) => (
                <Button
                    key={lng}
                    size="sm"
                    variant={current === lng ? 'default' : 'ghost'}
                    onClick={() => void i18n.changeLanguage(lng)}
                >
                    {lng.toUpperCase()}
                </Button>
            ))}
        </div>
    )
}
