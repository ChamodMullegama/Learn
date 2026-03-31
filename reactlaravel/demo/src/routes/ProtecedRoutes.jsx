import React from 'react'
import { Navigate, Outlet } from 'react-router';

const ProtecedRoutes = () => {
  const token = localStorage.getItem('token');

  if (!token) {
    return <Navigate to="/login" replace />;
  }

  return <Outlet />;
}

export default ProtecedRoutes