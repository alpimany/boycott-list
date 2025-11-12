import { SidebarProvider } from '@/components/ui/sidebar';

export default function Layout({ children }: { children: React.ReactNode }) {
    return (
        <SidebarProvider>
            <main className="w-full">
                <article>{children}</article>
            </main>
        </SidebarProvider>
    );
}
