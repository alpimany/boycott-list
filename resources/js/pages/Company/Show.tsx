import Layout from '@/components/Layout';
import { Button } from '@/components/ui/button';
import { Item, ItemContent, ItemDescription, ItemMedia, ItemTitle } from '@/components/ui/item';
import { storageUrl } from '@/lib/utils';
import { Company, Product } from '@/types';
import { Link } from '@inertiajs/react';
import { ArrowLeft } from 'lucide-react';
import { useRoute } from 'ziggy-js';

type Props = {
    company: Company;
    featuredProduct: Product;
};

export default function Products({ company, featuredProduct: product }: Props) {
    const route = useRoute();

    return (
        <Layout>
            <div className="mx-auto max-w-2xl space-y-8 p-4 md:py-16">
                <Button variant="outline" size="icon" className="float-left" asChild>
                    <Link href={route('boycott.products.index')}>
                        <ArrowLeft />
                    </Link>
                </Button>
                {product ? (
                    <div className="space-y-8">
                        <Item variant="outline" className="w-full">
                            <ItemMedia>
                                <div className="h-full max-h-24 w-full max-w-24 overflow-hidden rounded md:max-h-48 md:max-w-48">
                                    <img
                                        src={storageUrl(product.image)}
                                        alt={product.name}
                                        className="aspect-square w-full rounded-sm object-cover"
                                    />
                                </div>
                            </ItemMedia>
                            <ItemContent>
                                <ItemTitle>{product.name}</ItemTitle>
                                <ItemDescription>{product.description}</ItemDescription>
                            </ItemContent>
                        </Item>
                        <p className="prose dark:prose-invert text-justify text-base text-zinc-300 sm:text-lg" dangerouslySetInnerHTML={{ __html: company.description }}></p>
                    </div>
                ) : (
                    <div className="space-y-8">
                        <Item variant="outline" className="w-full">
                            <ItemMedia>
                                <div className="h-full max-h-32 w-full max-w-32 overflow-hidden rounded">
                                    <img
                                        src={storageUrl(company.image)}
                                        alt={company.name}
                                        className="aspect-square w-full rounded-sm object-cover"
                                    />
                                </div>
                            </ItemMedia>
                            <ItemContent>
                                <ItemTitle>{company.name}</ItemTitle>
                                <ItemDescription>{company.location}</ItemDescription>
                            </ItemContent>
                        </Item>
                        <p className="prose dark:prose-invert text-justify text-base text-zinc-300 sm:text-lg" dangerouslySetInnerHTML={{ __html: company.description }}></p>
                    </div>
                )}
            </div>
        </Layout>
    );
}
