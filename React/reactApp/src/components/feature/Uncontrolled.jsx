import React, { useRef } from 'react'

const Uncontrolled = () => {

  const fullnameRef = useRef(null);
  const emailRef = useRef(null);
  const passwordRef = useRef(null);

  const handleSubmit = (e) => {
    e.preventDefault();

    const data = {
      fullname: fullnameRef.current.value,
      email: emailRef.current.value,
      password: passwordRef.current.value
    };

    console.log(data);
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <input type="text" placeholder="Full Name" ref={fullnameRef} />
        <br />

        <input type="email" placeholder="Email" ref={emailRef} />
        <br />

        <input type="password" placeholder="Password" ref={passwordRef} />
        <br />

        <button type="submit">Register</button>
      </form>
    </div>
  );
};

export default Uncontrolled;
