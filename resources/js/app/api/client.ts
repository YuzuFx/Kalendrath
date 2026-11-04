import { useAuthStore } from '@/stores/auth'

/** Préfixe de l'API versionnée (cf. docs/decision-architecture-cible.md §4). */
const API_BASE = '/api/v1'

export class ApiError extends Error {
    readonly status: number
    readonly body: unknown

    constructor(status: number, body: unknown) {
        super(`API error ${status}`)
        this.name = 'ApiError'
        this.status = status
        this.body = body
    }
}

interface RequestOptions {
    method?: 'GET' | 'POST' | 'PUT' | 'PATCH' | 'DELETE'
    body?: unknown
    signal?: AbortSignal
    /** Jeton explicite, pour les appels faits avant que la session soit enregistrée dans le store. */
    token?: string
}

/** Client JSON : jeton Bearer Sanctum, et déconnexion automatique sur 401. */
export async function api<T>(path: string, options: RequestOptions = {}): Promise<T> {
    const state = useAuthStore.getState()
    const token = options.token ?? state.token
    const clear = state.clear
    const headers: Record<string, string> = { Accept: 'application/json' }
    if (token) headers.Authorization = `Bearer ${token}`
    if (options.body !== undefined) headers['Content-Type'] = 'application/json'

    const init: RequestInit = { method: options.method ?? 'GET', headers }
    if (options.body !== undefined) init.body = JSON.stringify(options.body)
    if (options.signal) init.signal = options.signal

    const response = await fetch(`${API_BASE}${path}`, init)

    if (response.status === 401 && state.token) {
        clear({ expired: true })
    }
    const text = await response.text()
    const data: unknown = text ? JSON.parse(text) : null
    if (!response.ok) throw new ApiError(response.status, data)
    return data as T
}
