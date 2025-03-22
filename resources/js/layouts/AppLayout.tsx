import { Link } from "@inertiajs/react";

export default function AppLayout({ children, breadcrumbs }) {
    return (
        <div className="flex h-screen bg-gray-100">
            {/* Sidebar */}
            <aside className="w-64 bg-white shadow-md">
                <div className="p-4 text-lg font-bold">Laravel Starter Kit</div>
                <nav className="mt-4">
                    <Link href="/dashboard" className="block p-2 hover:bg-gray-200">
                        Dashboard
                    </Link>
                    <Link href="/tools" className="block p-2 hover:bg-gray-200">
                        Tools
                    </Link>
                    <Link href="/profile" className="block p-2 hover:bg-gray-200">
                        Profile
                    </Link>
                </nav>
            </aside>

            {/* Main Content */}
            <div className="flex-1 flex flex-col">
                {/* Header */}
                <header className="bg-white shadow-md p-4">
                    <h1 className="text-lg font-bold">
                        {breadcrumbs && breadcrumbs.length > 0 ? breadcrumbs[0].title : "Page"}
                    </h1>
                </header>

                {/* Page Content */}
                <main className="flex-1 p-6">{children}</main>

                {/* Footer */}
                <footer className="bg-white shadow-md p-4 text-center">
                    © 2024 Laravel Starter Kit
                </footer>
            </div>
        </div>
    );
}
