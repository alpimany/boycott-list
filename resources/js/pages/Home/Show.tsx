import Layout from '@/components/Layout';
import { Input } from '@/components/ui/input';
import { Item, ItemContent, ItemDescription, ItemHeader, ItemTitle } from '@/components/ui/item';
import { storageUrl } from '@/lib/utils';
import { Product } from '@/types';
import { InfiniteScroll, Link, router, usePage } from '@inertiajs/react';
import { SearchIcon } from 'lucide-react';
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
            <div className="flex items-center justify-center p-4 sm:p-6 md:p-16">
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
                                        <img src={storageUrl(product.image)} alt={product.name} className="aspect-square w-full rounded-sm object-cover" />
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
