import React from 'react'

const Uncontroll = () => {

    const formsubmit =()=>{
        
    }
  return (
    <div>
          <form action="" onSubmit={formsubmit}> 
        <h1>Uncontroll  Registation Form </h1>
        <input type="text" name='fname' placeholder='enter name' onChange={handelChange} />
        <input type="email" name='email' placeholder='enter email' onChange={handelChange} />
        <input type="password" name='password' placeholder='enter password' onChange={handelChange} />
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

export default Uncontroll