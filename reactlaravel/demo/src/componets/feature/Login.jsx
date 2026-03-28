import React, { useEffect } from "react";
import { useState } from "react";

const Login = () => {
  const [isFromSubmitted, setisFromSubmitted] = useState(false);
  const [errors, setErrors] = useState({});
  const [serverResponse, setserverResponse] = useState({
    type: "",
    message: "",
  });
  const [isloading, setisloading] = useState(false);

  const [formData, setFormData] = useState({
    email: "",
    password: "",
  });

  const handelChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  useEffect(() => {
    if (!serverResponse.message) return;
    const timer = setTimeout(() => {
      setserverResponse({
        type: "",
        message: "",
      });
    }, 3000);

    return () => clearTimeout(timer);
  }, [serverResponse.message]);

  const formsubmit = async (e) => {
    e.preventDefault();
    const isValid = validateFrom();
    if (!isValid) return;

    setisloading(true);
    setisFromSubmitted(true);

    try {
      const response = await fetch(
        "http://127.0.0.1:8000/api/login",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            accept: "application/json",
          },
          body: JSON.stringify(formData),
        }
      );

      const data = await response.json();
      console.log(data);

      if (!response.ok) {
        setErrors((prev) => ({
          ...prev,
          ...data.errors,
        }));

        setserverResponse({
          type: "error",
          message: data.message,
        });

        setisloading(false);
        return;
      }

      setErrors({});
      setserverResponse({
        type: "success",
        message: data.message,
      });
      setisloading(false);

    } catch (error) {
      console.log("api error", error);
      setisloading(false);
    }
  };

  const validateFrom = () => {
    let neweerrors = {};

    if (!formData.email.trim()) {
      neweerrors.email = "Email is required";
    } else if (!/\S+@\S+\.\S+/.test(formData.email)) {
      neweerrors.email = "Email is invalid";
    }

    if (!formData.password.trim()) {
      neweerrors.password = "Password is required";
    } else if (formData.password.length < 6) {
      neweerrors.password = "Password must be at least 6 characters";
    }

    setErrors(neweerrors);
    return Object.keys(neweerrors).length === 0;
  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-100">
      <div className="bg-white p-8 rounded shadow-lg w-full max-w-md">
        <form onSubmit={formsubmit} className="space-y-4">
          <h1 className="text-2xl font-bold text-center text-gray-700 mb-4">
            Login Form
          </h1>

          {/* Email */}
          <div>
            <input
              type="text"
              name="email"
              placeholder="Enter Email"
              onChange={handelChange}
              value={formData.email}
              className={`w-full p-3 border rounded-lg ${
                errors.email ? "border-red-500" : "border-gray-300"
              }`}
            />
            {errors.email && (
              <p className="text-red-500 text-sm mt-1">
                {Array.isArray(errors.email)
                  ? errors.email[0]
                  : errors.email}
              </p>
            )}
          </div>

          {/* Password */}
          <div>
            <input
              type="password"
              name="password"
              placeholder="Enter Password"
              onChange={handelChange}
              value={formData.password}
              className={`w-full p-3 border rounded-lg ${
                errors.password ? "border-red-500" : "border-gray-300"
              }`}
            />
            {errors.password && (
              <p className="text-red-500 text-sm mt-1">
                {Array.isArray(errors.password)
                  ? errors.password[0]
                  : errors.password}
              </p>
            )}
          </div>

          <button
            type="submit"
            className="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition"
          >
            {isloading ? "Loading..." : "Login"}
          </button>
        </form>

        {serverResponse.message && (
          <p
            className={`mt-4 text-center text-green-200 ${
              serverResponse.type === "success"
                ? "bg-green-800"
                : "bg-red-800"
            } p-2 rounded`}
          >
            {serverResponse.message}
          </p>
        )}
      </div>
    </div>
  );
};

export default Login;