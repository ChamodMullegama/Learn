import React, { useState } from "react";
import getshortusername from "../../helpers/getshortusername";
import { Link } from "react-router";

const Header = ({ user, logout, loading, error }) => {
  const [open, setopen] = useState(false);

  return (
    <header className="flex justify-between items-center bg-white shadow px-6 py-3">
      <h1 className="text-lg font-semibold">Dashboard</h1>

      <div className="flex items-center gap-6">
        {loading ? (
          <span className="text-gray-400 text-sm">Loading...</span>
        ) : error ? (
          <span className="text-red-500 text-sm">{error}</span>
        ) : user ? (
          <div className="text-right">
            <p className="text-sm font-semibold text-gray-700">{user.name}</p>
            <p className="text-xs text-gray-400">{user.email}</p>
          </div>
        ) : null}

        {/* <button
          className="bg-red-500 text-white px-4 py-2 rounded-2xl hover:bg-red-800 transition"
          onClick={logout}
        >
          Logout
        </button> */}

        <div className="relative">
          <button
            onClick={() => setopen(!open)}
            className="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold"
          >
            {user ? getshortusername(user.name) : ""}
          </button>

          <div className={`absolute top-12 right-0 bg-white shadow-md rounded p-4 w-48 z-10 ${open ? "block" : "hidden"}`}>
            <Link
              to="/dashboard/profile"
              className="block px-4 py-2 hover:bg-gray-200"
            >
              Profile
            </Link>

            <button onClick={logout} className="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600 cursor-pointer">Logout</button>
          </div>
        </div>
      </div>
    </header>
  );
};

export default Header;