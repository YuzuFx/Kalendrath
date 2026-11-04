import { api } from './client'

export interface User {
    id: number
    username: string
}

export interface LoginResponse {
    token: string
    user: User
}

const DEVICE_NAME = 'kalendrath-web'

// Contrat côté Laravel : POST /auth/token → { token }, GET /me, DELETE /auth/token (204).
// Le login enchaîne les deux premiers appels pour garder une API simple côté écrans.
export async function login(email: string, password: string): Promise<LoginResponse> {
    const { token } = await api<{ token: string }>('/auth/token', {
        method: 'POST',
        body: { email, password, device_name: DEVICE_NAME },
    })
    const user = await api<User>('/me', { token })
    return { token, user }
}

export const fetchMe = () => api<User>('/me')

export const logout = () => api<null>('/auth/token', { method: 'DELETE' })
