import React, { useEffect } from "react";
import { useState } from "react";

const Registation = () => {
  const [isFromSubmitted, setisFromSubmitted] = useState(false);
  const [errors, setErrors] = useState({});
  const [serverResponse, setserverResponse] = useState({
    type: "",
    message: "",
  });
  const [isloading, setisloading] = useState(false);

  const [formData, setFormData] = useState({
    fname: "",
    email: "",
    password: "",
    comfrompassword: "",
  });

  const handelChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  useEffect(() => {
if(!serverResponse.message) return;
const timer = setTimeout(() => {
  setserverResponse({
    type: "",
    message: "",
  });
},3000);

return () => clearTimeout(timer);
  }, [serverResponse.message]);

  const formsubmit = async (e) => {
    e.preventDefault();
    const isValid = validateFrom();
    if (!isValid) return;

    setisloading(true);
    setisFromSubmitted(true);

    try {
      const payload = {
        fname: formData.fname,
        email: formData.email,
        password: formData.password,
        password_confirmation: formData.comfrompassword
      };

      const response = await fetch(
        "http://127.0.0.1:8000/api/register",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "accept": "application/json",
          },
          body: JSON.stringify(payload),
        }
      );

      const data = await response.json();
      console.log(data);

      if (!response.ok) {
        if (response.status === 422 && data.errors) {
          setErrors((prev) => ({
            ...prev,
            ...data.errors
          }));

          setserverResponse({
            type: "error",
            message: data.message
          });
        }

        setserverResponse({
          type:"success",
         message: data.message
        });
        setisloading(false);
        return;
      }

      setErrors({});
      setserverResponse(data.message);
      setisloading(false);

    } catch (error) {
      console.log("api error", error);
      setisloading(false);
    }
  };

  const validateFrom = () => {
    let neweerrors = {};

    if (!formData.fname.trim()) {
      neweerrors.fname = "Name is required";
    }

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

    if (!formData.comfrompassword.trim()) {
      neweerrors.comfrompassword = "Enter your password again";
    } else if (formData.password !== formData.comfrompassword) {
      neweerrors.comfrompassword = "Passwords do not match";
    }

    setErrors(neweerrors);
    return Object.keys(neweerrors).length === 0;
  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-100">
      <div className="bg-white p-8 rounded shadow-lg w-full max-w-md">
        <form onSubmit={formsubmit} className="space-y-4">
          <h1 className="text-2xl font-bold text-center text-gray-700 mb-4">
            Registration Form
          </h1>

          {/* Name */}
          <div>
            <input
              type="text"
              name="fname"
              placeholder="Enter Name"
              onChange={handelChange}
              value={formData.fname}
              className={`w-full p-3 border rounded-lg ${
                errors.fname ? "border-red-500" : "border-gray-300"
              }`}
            />
            {errors.fname && (
              <p className="text-red-500 text-sm mt-1">
                {Array.isArray(errors.fname) ? errors.fname[0] : errors.fname}
              </p>
            )}
          </div>

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
                {Array.isArray(errors.email) ? errors.email[0] : errors.email}
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
                {Array.isArray(errors.password) ? errors.password[0] : errors.password}
              </p>
            )}
          </div>

          {/* Confirm Password */}
          <div>
            <input
              type="password"
              name="comfrompassword"
              placeholder="Confirm Password"
              onChange={handelChange}
              value={formData.comfrompassword}
              className={`w-full p-3 border rounded-lg ${
                errors.comfrompassword ? "border-red-500" : "border-gray-300"
              }`}
            />
            {errors.comfrompassword && (
              <p className="text-red-500 text-sm mt-1">
                {Array.isArray(errors.comfrompassword)
                  ? errors.comfrompassword[0]
                  : errors.comfrompassword}
              </p>
            )}
          </div>

          <button
            type="submit"
            className="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition"
          >
            {isloading ? "Loading..." : "Register"}
          </button>
        </form>

        {serverResponse && (
          <p className={`mt-4 text-center text-green-200 ${serverResponse.type === "success" ? "bg-green-800" : "bg-red-800"} p-2 rounded`}>
            {serverResponse.message}
          </p>
        )}
      </div>

      {isFromSubmitted && (
        <div className="ml-6 bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
          <h1 className="text-xl font-semibold text-gray-700 mb-3">
            Form Data
          </h1>

          <h3>Name : {formData.fname}</h3>
          <h3>Email : {formData.email}</h3>
          <h3>Password : {formData.password}</h3>
        </div>
      )}
    </div>
  );
};

export default Registation;