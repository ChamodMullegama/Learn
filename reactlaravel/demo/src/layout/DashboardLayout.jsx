import React, { useEffect, useState } from "react";
import { Outlet, useNavigate } from "react-router";
import Header from "../componets/common/Header";
import SidBar from "../componets/common/SidBar";

const DashboardLayout = () => {
  const navGate = useNavigate();
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  useEffect(() => {
    getProfile();
  }, []);

  const getProfile = async () => {
    const token = localStorage.getItem("token");

    if (!token) {
      navGate("/login");
      return;
    }

    try {
      const apiresponse = await fetch("http://127.0.0.1:8000/api/userProfile", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${token}`,
        },
      });

      if (!apiresponse.ok) {
        if (apiresponse.status === 401) {
          localStorage.removeItem("token");
          navGate("/login");
          return;
        }
        setError("Failed to load profile.");
        setLoading(false);
        return;
      }

      const response = await apiresponse.json();
      const userData = response.data || response.user || response;
      setUser(userData);
      setLoading(false);

    } catch (error) {
      console.log("Error fetching profile:", error);
      setError("Something went wrong.");
      setLoading(false);
    }
  };

  const logout = async () => {
    try {
      await fetch("http://127.0.0.1:8000/api/logout", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });
    } catch (error) {
      console.log("Logout error:", error);
    } finally {
      localStorage.removeItem("token");
      navGate("/login");
    }
  };

  return (
    <div className="flex h-screen">
      <SidBar />
      <div className="flex-1 flex flex-col overflow-auto">
        <Header user={user} logout={logout} loading={loading} error={error} />
        <main className="p-6 flex-1">
          <Outlet />
        </main>
      </div>
    </div>
  );
};

export default DashboardLayout;