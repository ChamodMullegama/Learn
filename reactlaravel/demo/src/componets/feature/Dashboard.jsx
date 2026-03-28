import React, { useEffect, useState } from 'react';

const Dashboard = ({ setPage }) => {
  const [user, setUser] = useState(null);

  useEffect(() => {
    geProfile();
  }, []);

  const geProfile = async () => {
    const token = localStorage.getItem("token");

    try {
      const apiresponse = await fetch("http://127.0.0.1:8000/api/userProfile", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          accept: "application/json",
          Authorization: `Bearer ${token}`
        }
      });

      if (apiresponse.status === 401) {
        localStorage.removeItem("token");
        setPage("login");
        return;
      }

      const response = await apiresponse.json();

      setUser(response.data);

    } catch (error) {
      console.log(error);
    }
  };

  return (
    <div className='min-h-screen flex items-center justify-center bg-gray-200'>
      <div className='bg-white shadow-lg rounded-lg p-6 w-full max-w-3xl text-center'>
        <h2 className='text-2xl font-bold mb-4'>Dashboard</h2>

        {user ? (
          <>
            <p>User name: {user.name}</p>
            <p>User email: {user.email}</p>
          </>
        ) : (
          <p>Loading...</p>
        )}

      </div>
    </div>
  );
};

export default Dashboard;