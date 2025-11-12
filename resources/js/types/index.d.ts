export interface Auth {
    user: User;
}

export interface SharedData {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    [key: string]: unknown;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
    [key: string]: unknown; // This allows for additional properties...
}

export interface Product {
    id: number;
    name: string;
    description: string;
    image: string;
    company: Company;
    replacements: ProductAlternative[];
}

export interface Company {
    id: number;
    name: string;
    location: string;
    image: string;
    description: string;
}

export interface ProductAlternative {
    name: string;
}
