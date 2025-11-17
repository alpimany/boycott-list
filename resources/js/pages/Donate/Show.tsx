import Layout from '@/components/Layout';
import { Button } from '@/components/ui/button';
import { Head, Link } from '@inertiajs/react';
import { ArrowLeft, Github, HandCoins } from 'lucide-react';
import { route } from 'ziggy-js';

export default function Donate() {
    return (
        <Layout>
            <div className="mx-auto max-w-2xl space-y-8 p-4 md:py-16">
                <Button variant="outline" size="icon" className="float-left" asChild>
                    <Link href={route('boycott.home.index')}>
                        <ArrowLeft />
                    </Link>
                </Button>
                <Head>
                    <title>التبرع</title>
                </Head>
                <div className="flex flex-col items-center justify-center gap-16 py-16">
                    <div dir="rtl" className="flex max-w-xl flex-col justify-center">
                        <h1 className="text-4xl font-bold">
                            <HandCoins />
                            التبرع
                        </h1>
                        <p className="mt-4 text-lg">
                            هذا الموقع تطوعي ولا يحقق أية أرباح من الإعلانات أو ما شابه، فهل تود أن تظهر بعض الدعم ليستمر عملنا؟ يمكنك استعمال رابط
                            (bymeacoffee) أدناه لدعم مالك المشروع.
                        </p>
                        <a href="https://buymeacoffee.com/alpimany" target="_blank" rel="noopener noreferrer" className="mt-8">
                            <Button>اشترِ لي قهوة</Button>
                        </a>
                    </div>
                    <div dir="rtl" className="flex max-w-xl flex-col justify-center">
                        <h1 className="text-4xl font-bold">
                            <Github />
                            التطوير
                        </h1>
                        <p className="mt-4 text-lg">
                            قائمة المُنتجات المقاطعة مشروع مفتوح المصدر، ويمكنك المساهمة في تطويره إن شئت.{' '}
                            <a className="text-blue-600" href="https://github.com/alpimany/boycott-list">
                                اطلع على صفحة جتهب لتعرف المزيد.
                            </a>{' '}
                        </p>
                    </div>
                </div>
            </div>
        </Layout>
    );
}
