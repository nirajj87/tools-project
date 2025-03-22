import { type SharedData } from "@/types";
import { Head, usePage } from "@inertiajs/react";
import Navbar from "@/components/home-nav";

import CardComponent from "@/components/ui/CardComponent";

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title="Welcome">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>

            <div className="flex flex-col items-center bg-[#FDFDFC] min-h-screen p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
                
                {/* Navbar & Title */}
                <header className="w-full max-w-7xl">
                    <Navbar />
                </header>

                <h2 className="text-3xl font-bold text-center my-8">AI-Based Tools</h2>

                {/* Cards Grid */}
                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full max-w-7xl">
                  
                    {[...Array(4)].map((_, index) => (
                       <CardComponent
                       thumbnail="https://picsum.photos/300"
                       title="PDF to Word Converter"
                       description="Easily convert PDF files into editable Word documents while preserving formatting."
                       buttonLabel="Try Now"
                       buttonLink="/pdf-to-word"
                       className="w-80 mx-auto" 
                     />
                     
                        
                    ))}
                </div>

                <h2 className="text-3xl font-bold text-center my-8">Media & File Tools</h2>

{/* Cards Grid */}
<div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full max-w-7xl">
  
    {[...Array(4)].map((_, index) => (
       <CardComponent
       thumbnail="https://picsum.photos/300"
       title="PDF to Word Converter"
       description="Easily convert PDF files into editable Word documents while preserving formatting."
       buttonLabel="Try Now"
       buttonLink="/pdf-to-word"
       className="w-80 mx-auto" 
     />
     
        
    ))}
</div>

<h2 className="text-3xl font-bold text-center my-8">General Tools</h2>

{/* Cards Grid */}
<div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full max-w-7xl">
  
    {[...Array(4)].map((_, index) => (
       <CardComponent
       thumbnail="https://picsum.photos/300"
       title="PDF to Word Converter3"
       description="Easily convert PDF files into editable Word documents while preserving formatting."
       buttonLabel="Try Now"
       buttonLink="/pdf-to-word"
       className="w-80 mx-auto" 
     />
     
        
    ))}
</div>

            </div>
        </>
    );
}
