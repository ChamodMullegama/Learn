import { useState } from 'react'
import './App.css'
import { Route, Routes } from 'react-router-dom'
import PostList from './assets/pages/PostList'

function App() {


  return (
   <div>
     <Routes>
       <Route path='/' element={<PostList/>} />
     </Routes>
   </div>
  )
}

export default App
