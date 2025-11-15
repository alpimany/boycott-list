import Layout from '@/components/Layout';
import { Button } from '@/components/ui/button';
import { Head } from '@inertiajs/react';
import { Github, HandCoins } from 'lucide-react';

export default function Donate() {
    return (
        <Layout>
            <Head>
                <title>التبرع</title>
                <meta name="description" content="إذا أعجبك المشروع، يرجى التفكير في التبرع لدعمه." />
            </Head>
            <div className="flex flex-col items-center justify-center gap-16 py-16">
                <div dir="rtl" className="flex max-w-xl flex-col items-center justify-center">
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
                <div dir="rtl" className="flex max-w-xl flex-col items-center justify-center">
                    <h1 className="text-4xl font-bold">
                        <Github />
                        التطوير
                    </h1>
                    <p className="mt-4 text-lg">
                        قائمة المنجات المقاطعة مشروع مفتوح المصدر، ويمكنك المساهمة في التطوير إن شئت.{' '}
                        <a className="text-blue-600" href="https://github.com/alpimany/boycott-list">
                            اطلع على صفحة جتهب لتعرف المزيد.
                        </a>{' '}
                    </p>
                </div>
            </div>
        </Layout>
    );
}
