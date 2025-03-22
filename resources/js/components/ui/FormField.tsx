export default function FormField({ 
    type = "text", 
    name = "", 
    id = "", 
    value = "", 
    className = "", 
    is_required = false, 
    label = "", 
    placeholder = "", 
    readonly = false, 
    options = [], 
    error = "", 
    columnSize = "full", // Default: Full Width
    onChange 
}) {
    // Column Width Management
    const columnClasses = {
        full: "w-full",  // 1 Column (Full Width)
        half: "w-1/2",   // 2 Columns
        third: "w-1/3",  // 3 Columns
        quarter: "w-1/4" // 4 Columns
    };

    return (
        <div className={`mb-4 px-2 ${columnClasses[columnSize] || "w-full"}`}>
            {/* Label with Required Asterisk */}
            {label && (
                <label htmlFor={id} className="block text-sm font-medium mb-1">
                    {label} 
                    {is_required && <span className="text-red-500"> *</span>}
                </label>
            )}

            {/* Input Field */}
            {type === "text" && (
                <input 
                    type="text" 
                    id={id} 
                    name={name} 
                    value={value} 
                    placeholder={placeholder} 
                    className={`w-full border p-2 rounded ${className}`} 
                    required={is_required} 
                    readOnly={readonly} 
                    onChange={onChange}
                />
            )}

            {/* Textarea Field */}
            {type === "textarea" && (
                <textarea 
                    id={id} 
                    name={name} 
                    value={value} 
                    placeholder={placeholder} 
                    className={`w-full border p-2 rounded ${className}`} 
                    required={is_required} 
                    readOnly={readonly} 
                    onChange={onChange}
                ></textarea>
            )}

            {/* File Upload */}
            {type === "file" && (
                <input 
                    type="file" 
                    id={id} 
                    name={name} 
                    className={`w-full border p-2 rounded ${className}`} 
                    required={is_required} 
                    onChange={onChange}
                />
            )}

            {/* Select Dropdown */}
            {type === "select" && (
                <select 
                    id={id} 
                    name={name} 
                    value={value} 
                    className={`w-full border p-2 rounded ${className}`} 
                    required={is_required} 
                    onChange={onChange}
                >
                    <option value="">Select an option</option>
                    {options.map((option, index) => (
                        <option key={index} value={option.value}>{option.label}</option>
                    ))}
                </select>
            )}

            {/* Radio Buttons */}
            {type === "radio" && options.length > 0 && (
                <div className="flex gap-4">
                    {options.map((option, index) => (
                        <label key={index} className="flex items-center space-x-2">
                            <input 
                                type="radio" 
                                name={name} 
                                value={option.value} 
                                checked={value === option.value}
                                className={className} 
                                required={is_required} 
                                onChange={onChange}
                            />
                            <span>{option.label}</span>
                        </label>
                    ))}
                </div>
            )}

            {/* Checkbox */}
            {type === "checkbox" && options.length > 0 && (
                <div className="flex gap-4">
                    {options.map((option, index) => (
                        <label key={index} className="flex items-center space-x-2">
                            <input 
                                type="checkbox" 
                                name={name} 
                                value={option.value} 
                                checked={value.includes(option.value)}
                                className={className} 
                                required={is_required} 
                                onChange={onChange}
                            />
                            <span>{option.label}</span>
                        </label>
                    ))}
                </div>
            )}

            {/* Error Message */}
            {error && <p className="text-red-500 text-sm mt-1">{error}</p>}
        </div>
    );
}
