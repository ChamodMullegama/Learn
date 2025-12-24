import React, { useState } from 'react'

const Registration = () => {

const [formData, setFormData] = useState({
    fullname: '',
    email: '',
    password: ''
});

const handleChange = (e) => {
    const {name, value} = e.target;

    setFormData({...formData,[name]: value});
}

const handelSubmit = (e) => {
    e.preventDefault();
    console.log(formData);
}

  return (
    <div>
        <h1>Registration Component</h1>
        <form action="" onSubmit={handelSubmit}> 
            <input type="text" onChange={handleChange} name='fullname' value={formData.fullname} />
            <input type="email" onChange={handleChange} name='email' value={formData.email} />
            <input type="password" onChange={handleChange} name='password' value={formData.password} />
            <button type='submit'>Register</button>
        </form>
        <div>
            <h1>
                from data
            </h1>
            <ol>
                <li>full name : {formData.fullname}</li>
                <li>email : {formData.email}</li>
                <li>password : {formData.password}</li>
            </ol>
        </div>
    </div>
  )
}

export default Registration