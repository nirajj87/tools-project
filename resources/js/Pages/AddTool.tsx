import AppLayout from "@/layouts/app-layout";
import { Head, useForm, usePage } from "@inertiajs/react"; // Ensure correct import
import { Button } from "@/components/ui/button";
import FormField from "@/components/ui/FormField";

import { toast } from "react-hot-toast";
import { useEffect } from "react";


export default function AddTool() {
    // Ensure props are correctly handled

    const { statusOptions = [], category = [] } = usePage().props || {};
    const { flash } = usePage().props; // ✅ Getting the flash messages

    useEffect(() => {
        console.log("Flash messages:", flash); // Debugging
        if (flash?.success) {
            toast.success(flash.success);
        }
        if (flash?.error) {
            toast.error(flash.error);
        }
    }, [flash]);

    const { data, setData, post, processing, errors, reset } = useForm({
        title: "",
        category: "",
        short_des: "",
        description: "",
        image: null,
        button_label: "",
        status: "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append("title", data.title);
        formData.append("category", data.category);
        formData.append("short_des", data.short_des);
        formData.append("description", data.description);
        formData.append("button_label", data.button_label);
        formData.append("status", data.status);
        if (data.image) {
            formData.append("image", data.image);
        }
        post("/tools", {
            data: formData,
            headers: {
                "Content-Type": "multipart/form-data",
            },
            onSuccess: () => reset(),
        });
    };

    console.log(usePage().props); // Debugging

    return (
        <AppLayout breadcrumbs={[{ title: "Tools", href: "/tools" }, { title: "Add Tool", href: "/tools/add" }]}>
            <Head title="Add Tool" />
            <div className="w-full max-w-6xl mx-auto bg-white p-6 rounded shadow">
                <h1 className="text-2xl font-semibold mb-4">Add New Tool</h1>

                <form onSubmit={handleSubmit} className="grid grid-cols-2 gap-4">
                    {/* Title Field */}
                    <FormField
                        type="text"
                        name="title"
                        id="title"
                        value={data.title}
                        label="Title"
                        placeholder="Enter Title"
                        is_required={true}
                        columnSize="full"
                        error={errors.title}
                        onChange={(e) => setData("title", e.target.value)}
                    />

                    {/* Category Field */}
                    <FormField
                        type="select"
                        name="category"
                        id="category"
                        value={data.category}
                        label="Category"
                        is_required={true}
                        columnSize="full"
                        options={category}
                        onChange={(e) => setData("category", e.target.value)}
                    />
                    {/* Short Description */}
                    <FormField
                        type="textarea"
                        name="short_des"
                        id="short_des"
                        value={data.short_des}
                        label="Short Description"
                        placeholder="Enter Short Description"
                        is_required={true}
                        columnSize="full"
                        error={errors.short_des}
                        onChange={(e) => setData("short_des", e.target.value)}
                    />
                    {/* Description */}
                    <FormField
                        type="textarea"
                        name="description"
                        id="description"
                        value={data.description}
                        label="Description"
                        placeholder="Enter Description"
                        is_required={true}
                        columnSize="full"
                        error={errors.description}
                        className="col-span-2"
                        onChange={(e) => setData("description", e.target.value)}
                    />

                    {/* Image Upload */}
                    <FormField
                        type="file"
                        name="image"
                        id="image"
                        label="Upload Image"
                        is_required={true}
                        columnSize="full"
                        error={errors.image}
                        onChange={(e) => setData("image", e.target.files ? e.target.files[0] : null)}
                    />
                    {/* Status Dropdown */}
                    <FormField
                        type="select"
                        name="status"
                        id="status"
                        value={data.status}
                        label="Status"
                        isRequired={true}
                        columnSize="full"
                        options={statusOptions}
                        onChange={(e) => setData("status", e.target.value)}
                    />
                    {/* Button Label */}
                    <FormField
                        type="text"
                        name="button_label"
                        id="button_label"
                        value={data.button_label}
                        label="Button Label"
                        placeholder="Enter Button Label"
                        is_required={false}
                        columnSize="full"
                        error={errors.button_label}
                        onChange={(e) => setData("button_label", e.target.value)}
                    />

                    {/* Submit Buttons */}
                    <div className="col-span-2 flex justify-end gap-2 mt-4">
                        <Button type="button" variant="outline" onClick={() => reset()}>
                            Cancel
                        </Button>
                        <Button type="submit" disabled={processing}>
                            Save Tool
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
