import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function storageUrl(path: string | undefined): string | undefined {
    return path !== undefined ? (path.startsWith('http') ? path : makeUrl(path)) : undefined;
}

function makeUrl(path: string) {
    switch (import.meta.env.VITE_FILESYSTEM_DISK) {
        case 'public':
            return `${import.meta.env.VITE_APP_URL}/storage/${path}`;
        case 's3':
            return `${import.meta.env.VITE_AWS_URL}/${path}`;
        default:
            return undefined;
    }
}
