import { create } from 'zustand'
import type { User } from '@/api/auth'

const STORAGE_KEY = 'kalendrath.token'

function readToken(): string | null {
    try {
        return localStorage.getItem(STORAGE_KEY)
    } catch {
        return null
    }
}

interface AuthState {
    token: string | null
    user: User | null
    expired: boolean
    setSession: (token: string, user: User) => void
    clear: (opts?: { expired?: boolean }) => void
}

export const useAuthStore = create<AuthState>((set) => ({
    token: readToken(),
    user: null,
    expired: false,
    setSession: (token, user) => {
        try {
            localStorage.setItem(STORAGE_KEY, token)
        } catch {
            /* stockage indisponible : session limitée à l'onglet */
        }
        set({ token, user, expired: false })
    },
    clear: (opts) => {
        try {
            localStorage.removeItem(STORAGE_KEY)
        } catch {
            /* ignoré */
        }
        set({ token: null, user: null, expired: opts?.expired ?? false })
    },
}))
