import { useState } from "react";
import { useForm } from "@inertiajs/react";
import { Button } from "@/components/ui/button";
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogFooter } from "@/components/ui/dialog";

export default function AddToolModal({ onClose }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        title: "",
        short_des: "",
        description: "",
        image: "",
        button_label: "",
        status: "active",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/tools", {
            onSuccess: () => {
                reset();
                onClose();
            },
        });
    };

    return (
        <Dialog open onOpenChange={onClose}>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>Add New Tool</DialogTitle>
                </DialogHeader>
                <form onSubmit={handleSubmit}>
                    <div className="grid gap-4">
                        <div>
                            <label className="block text-sm font-medium">Title</label>
                            <input
                                type="text"
                                className="w-full border p-2 rounded"
                                value={data.title}
                                onChange={(e) => setData("title", e.target.value)}
                            />
                            {errors.title && <p className="text-red-500 text-xs">{errors.title}</p>}
                        </div>

                        <div>
                            <label className="block text-sm font-medium">Short Description</label>
                            <input
                                type="text"
                                className="w-full border p-2 rounded"
                                value={data.short_des}
                                onChange={(e) => setData("short_des", e.target.value)}
                            />
                        </div>

                        <div>
                            <label className="block text-sm font-medium">Description</label>
                            <textarea
                                className="w-full border p-2 rounded"
                                value={data.description}
                                onChange={(e) => setData("description", e.target.value)}
                            ></textarea>
                        </div>

                        <div>
                            <label className="block text-sm font-medium">Image URL</label>
                            <input
                                type="text"
                                className="w-full border p-2 rounded"
                                value={data.image}
                                onChange={(e) => setData("image", e.target.value)}
                            />
                        </div>

                        <div>
                            <label className="block text-sm font-medium">Button Label</label>
                            <input
                                type="text"
                                className="w-full border p-2 rounded"
                                value={data.button_label}
                                onChange={(e) => setData("button_label", e.target.value)}
                            />
                        </div>

                        <div>
                            <label className="block text-sm font-medium">Status</label>
                            <select
                                className="w-full border p-2 rounded"
                                value={data.status}
                                onChange={(e) => setData("status", e.target.value)}
                            >
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <DialogFooter className="mt-4">
                        <Button type="button" variant="outline" onClick={onClose}>
                            Cancel
                        </Button>
                        <Button type="submit" disabled={processing}>
                            Save Tool
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}
