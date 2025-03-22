import AppLayout from "@/layouts/app-layout";
import { Head, usePage, Link } from "@inertiajs/react";
import DataTable from "react-data-table-component";
import { Button } from "@/components/ui/button";
import { Plus, Edit, Trash } from "lucide-react";

const breadcrumbs = [{ title: "Tools", href: "/tools" }];

export default function Tools() {
    const { tools } = usePage().props; // Fetch tools from server

    // Define table columns
    const columns = [
        {
            name: "Title",
            selector: (row) => row.title,
            sortable: true,
        },
        {
            name: "Category",
            selector: (row) => row.category,
            sortable: true,
            cell: (row) => (
                <span>
                    {row.category == 1 ? "AI" : "General"}
                </span>
            ),
        },
        {
            name: "Short Description",
            selector: (row) => row.short_des,
            sortable: true,
        },
        {
            name: "Thumbnail",
            selector: (row) => row.image,
            sortable: false,
            cell: (row) =>
                row.image ? (
                    <img
                        src={row.image}
                        alt={row.title}
                        width="50"
                        height="50"
                        className="rounded-md border border-gray-200"
                    />
                ) : (
                    "No Image"
                ),
        },
        {
            name: "Button Label",
            selector: (row) => row.button_label,
            sortable: true,
        },
        {
            name: "Order",
            selector: (row) => row.order,
            sortable: true,
        },
        {
            name: "Status",
            selector: (row) => row.status,
            sortable: true,
            cell: (row) => (
                <span
                    className={`px-2 py-1 rounded-md ${
                        row.status == 1 ? "bg-green-100 text-green-700" : "bg-red-100 text-red-700"
                    }`}
                >
                    {row.status == 1 ? "Active" : "Inactive"}
                </span>
            ),
        },
        {
            name: "Updated At",
            selector: (row) =>
                new Date(row.updated_at).toLocaleString("en-US", {
                    year: "numeric",
                    month: "short",
                    day: "2-digit",
                    hour: "2-digit",
                    minute: "2-digit",
                    second: "2-digit",
                }),
            sortable: true,
        },
        {
            name: "Actions",
            cell: (row) => (
                <div>
                    <Button variant="outline" size="sm" className="mr-2">
                        <Edit size={16} />
                    </Button>
                    <Button variant="destructive" size="sm">
                        <Trash size={16} />
                    </Button>
                </div>
            ),
        },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Tools Management" />

            <div className="p-6 bg-white shadow-md rounded-md">
                {/* Header Section */}
                <div className="flex justify-between items-center mb-4">
                    <h2 className="text-xl font-bold">Tools Management</h2>
                    <Link href="/tools/add">
                        <Button>
                            <Plus size={18} className="mr-2" /> Add Tool
                        </Button>
                    </Link>
                </div>

                {/* Data Table */}
                <DataTable
                    columns={columns}
                    data={tools}
                    pagination
                    highlightOnHover
                    striped
                    responsive
                />
            </div>
        </AppLayout>
    );
}
