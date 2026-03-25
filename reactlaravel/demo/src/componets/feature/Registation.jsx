import React from 'react'

const Registation = () => {

    const [formData, setFormData] = useState({
        fname:"",
        email:"",
        password:""
    });

const handelChange = (e) =>{

    const {name, value} = e.target;

    setFormData({...formData,[name]:value});
};

const formsubmit = (e) =>{
    e.preventDefault();
}

  return (
    <div>
        
    <form action="" onSubmit={formsubmit}> 
        <h1>Registation Form </h1>
        <input type="text" name='fname' placeholder='enter name' onChange={handelChange} value={formData.fname}/>
        <input type="email" name='email' placeholder='enter email' onChange={handelChange} value={formData.email}/>
        <input type="password" name='password' placeholder='enter password' onChange={handelChange} value={formData.password}/>
        <button type='submit'>register</button>
    </form>
    <div>
        <h1>Form Data</h1>
        <h3>name : {formData.name}</h3>
        <h3>email : {formData.email}</h3>
        <h3>password : {formData.password}</h3>
    </div>
    </div>
  )
}

export default Registation