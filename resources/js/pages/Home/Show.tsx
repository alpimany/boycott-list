import Layout from '@/components/Layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Item, ItemContent, ItemDescription, ItemHeader, ItemTitle } from '@/components/ui/item';
import { storageUrl } from '@/lib/utils';
import { Product } from '@/types';
import { InfiniteScroll, Link, router, usePage } from '@inertiajs/react';
import { ArrowUpLeft, HandCoins, Home, Info, SearchIcon } from 'lucide-react';
import { useRoute } from 'ziggy-js';

type Props = {
    products: {
        data: Product[];
    };
};

export default function Products({ products }: Props) {
    const route = useRoute();
    const { search: initialSearch } = usePage<{
        search: string;
    }>().props;

    const handleSearchChange = (search: string) => {
        router.get(
            '/',
            { search },
            {
                preserveState: true,
                replace: true,
                reset: ['products'],
            },
        );
    };

    return (
        <Layout>
            <div className="flex flex-col items-center p-4 sm:p-6 md:p-16 gap-6 md:gap-16">
                <div className="flex items-center justify-center">
                    <div className="relative">
                        <Input
                            className="peer h-8 w-lg max-w-xs ps-8 pe-2"
                            placeholder="ستاربكس..."
                            type="search"
                            onChange={(e) => handleSearchChange(e.target.value)}
                            value={initialSearch}
                        />
                        <div className="pointer-events-none absolute inset-y-0 start-0 flex items-center justify-center ps-2 text-muted-foreground/80 peer-disabled:opacity-50">
                            <SearchIcon size={16} />
                        </div>
                    </div>
                </div>
                <div className="max-w-xl flex items-center justify-between text-muted-foreground">
                    <Button variant="link" asChild>
                        <Link href="/"><Home />الردهة</Link>
                    </Button>
                    <Button variant="link" asChild>
                        <a target="_blank" rel="external nofollow" href="https://github.com/alpimany/boycott-list/wiki/%D8%B9%D9%86%D9%91%D9%8E%D8%A7"><Info />من نحن؟<ArrowUpLeft /></a>
                    </Button>
                    <Button variant="link" asChild>
                        <Link href="/donate"><HandCoins />ادعمنا</Link>
                    </Button>
                </div>
            </div>
            <InfiniteScroll data="products" className="flex w-auto flex-wrap justify-center gap-2 p-2 sm:gap-6 md:min-w-2xl">
                {products.data.map((product) => {
                    return (
                        <Item
                            key={product.id}
                            variant="outline"
                            className="xs:max-w-none xs:w-46 max-w-3xs min-w-44 flex-1 sm:w-64 sm:flex-initial"
                            asChild
                        >
                            <Link
                                href={route('boycott.companies.show', {
                                    company: product.company.id,
                                    _query: {
                                        product: product.id,
                                    },
                                })}
                            >
                                <ItemHeader>
                                    <div className="h-full max-h-64 w-full max-w-64 overflow-hidden rounded">
                                        <img
                                            src={storageUrl(product.image)}
                                            alt={product.name}
                                            className="aspect-square w-full rounded-sm object-cover"
                                        />
                                    </div>
                                </ItemHeader>
                                <ItemContent>
                                    <ItemTitle>{product.name}</ItemTitle>
                                    <ItemDescription>{product.description}</ItemDescription>
                                </ItemContent>
                            </Link>
                        </Item>
                    );
                })}
            </InfiniteScroll>
        </Layout>
    );
}
