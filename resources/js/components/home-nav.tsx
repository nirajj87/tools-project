import { useState } from "react";
import { Link, usePage } from "@inertiajs/react";
import Logo from "@/components/app-logo";

export default function Navbar() {
  const { auth } = usePage().props; // Get auth data
  const [menuOpen, setMenuOpen] = useState(false);
  const [activeLink, setActiveLink] = useState(""); // Active link state

  // Function to handle active link change
  const handleActive = (link: string) => {
    setActiveLink(link);
  };

  return (
    <nav className="bg-white shadow-md">
      <div className="container mx-auto px-6 py-4 flex items-center justify-between">
        {/* Logo */}
        <div className="text-xl font-bold text-blue-600"><Logo /></div>

        {/* Desktop Menu */}
        <div className="hidden md:flex space-x-6 items-center">
          {["Home", "Payment", "Features"].map((item) => (
            <Link
              key={item}
              href={`/${item.toLowerCase()}`}
              className={`relative text-gray-700 hover:text-blue-600 transition-all pb-1 ${
                activeLink === item ? "text-blue-600 font-semibold" : ""
              }`}
              onClick={() => handleActive(item)}
            >
              {item}
              <span
                className={`absolute left-0 bottom-0 w-full h-0.5 bg-blue-600 transition-all duration-300 ${
                  activeLink === item ? "scale-x-100" : "scale-x-0"
                } hover:scale-x-100`}
              />
            </Link>
          ))}

          {/* Search Bar */}
          <input
            type="text"
            placeholder="Search..."
            className="px-3 py-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        {/* Login / Dashboard Condition */}
        <div className="hidden md:flex space-x-4">
          {auth.user ? (
            <Link
              href={route("dashboard")}
              className="px-5 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700"
            >
              Dashboard
            </Link>
          ) : (
            <>
              <Link
                href={route("login")}
                className="px-5 py-2 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white"
              >
                Log in
              </Link>
              <Link
                href={route("register")}
                className="px-5 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700"
              >
                Register
              </Link>
            </>
          )}
        </div>

        {/* Mobile Menu Button */}
        <button
          className="md:hidden text-gray-700"
          onClick={() => setMenuOpen(!menuOpen)}
        >
          ☰
        </button>
      </div>

      {/* Mobile Menu */}
      {menuOpen && (
        <div className="md:hidden px-6 py-4 space-y-2 bg-white shadow-lg">
          {["Home", "Payment", "Features"].map((item) => (
            <Link
              key={item}
              href={`/${item.toLowerCase()}`}
              className={`block relative text-gray-700 hover:text-blue-600 transition-all pb-1 ${
                activeLink === item ? "text-blue-600 font-semibold" : ""
              }`}
              onClick={() => handleActive(item)}
            >
              {item}
              <span
                className={`absolute left-0 bottom-0 w-full h-0.5 bg-blue-600 transition-all duration-300 ${
                  activeLink === item ? "scale-x-100" : "scale-x-0"
                } hover:scale-x-100`}
              />
            </Link>
          ))}

          <input
            type="text"
            placeholder="Search..."
            className="w-full px-3 py-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          />

          {/* Mobile Login / Dashboard Condition */}
          {auth.user ? (
            <Link
              href={route("dashboard")}
              className="block px-5 py-2 text-sm text-white bg-blue-600 rounded text-center hover:bg-blue-700"
            >
              Dashboard
            </Link>
          ) : (
            <>
              <Link
                href={route("login")}
                className="block px-5 py-2 text-sm text-blue-600 border border-blue-600 rounded text-center hover:bg-blue-600 hover:text-white"
              >
                Log in
              </Link>
              <Link
                href={route("register")}
                className="block px-5 py-2 text-sm text-white bg-blue-600 rounded text-center hover:bg-blue-700"
              >
                Register
              </Link>
            </>
          )}
        </div>
      )}
    </nav>
  );
}
