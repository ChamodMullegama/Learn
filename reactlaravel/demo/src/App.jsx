import { Route, Routes } from "react-router";
import PublicRoute from "./routes/PublicRoute";
import Registation from "./pages/auth/Registation";
import Login from "./pages/auth/Login";
import DashboardLayout from "./layout/DashboardLayout";
import Dashboard from "./pages/dashboard/Dashboard";
import { useState } from "react";
import ProtecedRoutes from "./routes/ProtecedRoutes";
import Profile from "./pages/dashboard/Profile";


function App() {
  const [showLogin, setshowLogin] = useState(false);
  const [page, setPage] = useState(
    localStorage.getItem("token") ? "dashboard" : "login"
  );

  return (
    <Routes>
      <Route element={<PublicRoute />}>
        <Route path="/register" element={<Registation />} />
        <Route path="/login" element={<Login />} />
      </Route>

      <Route element={<ProtecedRoutes />}>
        <Route element={<DashboardLayout />}>
          <Route path="/dashboard" element={<Dashboard />} />
                <Route path="/dashboard/profile/:id" element={<Profile />} />
        </Route>
      </Route>
    </Routes>

    // <div className="text-center">

    //   {/* {showLogin ? <Login /> : <Registation />} */}

    //   {page == "register" && <Registation setPage={setPage} />}
    //   {page == "login" && <Login setPage={setPage} />}
    //   {page == "dashboard" && <Dashboard setPage={setPage} />}

    //   {page === "register" || page === "login" ? (
    //     <>
    //       {page === "login" ? (
    //         <>
    //           <p>Do not have an account?</p>
    //           <button onClick={() => setPage("register")}>Register</button>
    //         </>
    //       ) : (
    //         <>
    //           <p>Already have an account?</p>
    //           <button onClick={() => setPage("login")}>Login</button>
    //         </>
    //       )}
    //     </>
    //   ) : null}

    // </div>
  );
}

export default App;
