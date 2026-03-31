import React, { useEffect, useState } from 'react';

const Dashboard = () => {
  const navGate = useNavigate();
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    getProfile();
  }, []);

  const getProfile = async () => {
    const token = localStorage.getItem("token");

    if (!token) {
      setPage("login");
      return;
    }

    try {
      const apiresponse = await fetch("http://127.0.0.1:8000/api/userProfile", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "Authorization": `Bearer ${token}`
        }
      });

      const response = await apiresponse.json();

      setUser(response.data);
      setLoading(false);

    } catch (error) {
      console.log("Error fetching profile:", error);
      setLoading(false);
    }
  };

  const logout = async () => {
    try {
      const apiresponse = await fetch("http://127.0.0.1:8000/api/logout", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "Authorization": `Bearer ${localStorage.getItem('token')}`
        }
      });

      // Even if API fails, logout locally
      localStorage.removeItem("token");
      // setPage("login");
      navGate('/login');

    } catch (error) {
      console.log("Logout error:", error);
      localStorage.removeItem("token");
    navGate('/login');
    }
  };

  return (
    <div className='min-h-screen flex items-center justify-center bg-gray-200'>
      <div className='bg-white shadow-lg rounded-lg p-6 w-full max-w-3xl text-center'>
        
        <h2 className='text-2xl font-bold mb-4'>Dashboard</h2>

        {loading ? (
          <p>Loading...</p>
        ) : user ? (
          <>
            <p><strong>User name:</strong> {user.name}</p>
            <p><strong>User email:</strong> {user.email}</p>
          </>
        ) : (
          <p>No user data found</p>
        )}

        <button
          className='bg-red-500 text-white px-4 py-2 rounded-2xl hover:bg-red-800 mt-4'
          onClick={logout}
        >
          Logout
        </button>

      </div>
    </div>
  );
};

export default Dashboard;