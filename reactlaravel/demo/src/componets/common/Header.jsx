import React from "react";

const Header = ({ user, logout, loading, error }) => {
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

        <button
          className="bg-red-500 text-white px-4 py-2 rounded-2xl hover:bg-red-800 transition"
          onClick={logout}
        >
          Logout
        </button>
      </div>
    </header>
  );
};

export default Header;