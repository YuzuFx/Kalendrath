import type fr from './fr'

type DeepString<T> = { [K in keyof T]: T[K] extends string ? string : DeepString<T[K]> }

// Doit avoir exactement la même forme que le français (vérifié par le typage).
const en: DeepString<typeof fr> = {
    app: { name: 'Kalendrath', loading: 'Loading…' },
    nav: { home: 'Home', logout: 'Log out', language: 'Language' },
    auth: {
        title: 'Sign in',
        email: 'Email address',
        password: 'Password',
        submit: 'Sign in',
        invalid: 'Invalid credentials.',
        sessionExpired: 'Your session has expired, please sign in again.',
        error: 'Something went wrong, please try again.',
    },
    home: { welcome: 'Welcome, traveller.', placeholder: 'Game screens will appear here.' },
}

export default en
